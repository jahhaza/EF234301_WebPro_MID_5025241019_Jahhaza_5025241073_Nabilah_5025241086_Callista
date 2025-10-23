<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->latest()->get();
        $cartCount = $this->getCartCount();

        return view('orders.index', compact('orders', 'cartCount'));
    }

    public function create()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty!');
        }

        $total = $this->calculateTotal($cart);
        $cartCount = $this->getCartCount();

        return view('orders.create', compact('cart', 'total', 'cartCount'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty!');
        }

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'street_address' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $total = $this->calculateTotal($cart);

        $order = Order::create([
            'order_id' => 'NKI-' . Str::upper(Str::random(8)),
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'pending',
            'customer_info' => [
                'name' => $request->full_name,
                'email' => $user->email,
                'phone' => $request->phone
            ],
            'shipping_address' => [
                'street' => $request->street_address,
                'village' => $request->village,
                'district' => $request->district,
                'city' => $request->city,
                'province' => $request->province,
                'postal_code' => $request->postal_code
            ],
            'payment_method' => 'bca_transfer',
            'notes' => $request->notes
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order created successfully! Please complete your payment.');
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403, 'Unauthorized access.');
        }

        $order->load('items.product');
        $cartCount = $this->getCartCount();

        return view('orders.show', compact('order', 'cartCount'));
    }

    public function uploadPayment(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'payment_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120'
        ]);

        if ($request->hasFile('payment_proof')) {
            $filePath = $request->file('payment_proof')->store('payment-proofs', 'public');
            $order->update([
                'payment_proof' => $filePath,
                'status' => 'processing'
            ]);

            return redirect()->route('orders.show', $order)
                ->with('success', 'Payment proof uploaded successfully! We will verify your payment shortly.');
        }

        return redirect()->back()
            ->with('error', 'Failed to upload payment proof. Please try again.');
    }

    public function adminIndex()
    {
        $orders = Order::with('user', 'items.product')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()
            ->with('success', 'Order status updated successfully!');
    }

    public function generateReceipt(Order $order)
    {
        if ($order->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403, 'Unauthorized access.');
        }

        // In a real application, you would generate a PDF receipt here
        // For now, we'll just return a view

        return view('orders.receipt', compact('order'));
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    private function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }
}