<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);
        $cartCount = $this->getCartCount();

        return view('cart.index', compact('cart', 'total', 'cartCount'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "badge" => $product->badge
            ];
        }
        
        session()->put('cart', $cart);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
                'cartCount' => $this->getCartCount(),
                'cartTotal' => $this->calculateTotal($cart)
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            
            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Cart updated successfully',
                    'cartCount' => $this->getCartCount(),
                    'cartTotal' => $this->calculateTotal($cart),
                    'itemTotal' => $cart[$request->id]['price'] * $request->quantity
                ]);
            }
        }
        
        return response()->json(['success' => false, 'message' => 'Product not found in cart']);
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart successfully!',
                'cartCount' => $this->getCartCount(),
                'cartTotal' => $this->calculateTotal($cart)
            ]);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function clearCart()
    {
        session()->forget('cart');
        
        return redirect()->route('cart.index')
            ->with('success', 'Cart cleared successfully!');
    }

    public function getCartData()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);
        $count = $this->getCartCount();

        return response()->json([
            'cartCount' => $count,
            'cartTotal' => $total,
            'cartItems' => $cart
        ]);
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