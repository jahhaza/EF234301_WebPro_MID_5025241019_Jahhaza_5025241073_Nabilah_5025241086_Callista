<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $membership = $user->membership;
        $membershipHistory = $user->membershipHistory ?? collect();
        $cartCount = $this->getCartCount();

        return view('membership.index', compact('user', 'membership', 'membershipHistory', 'cartCount'));
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'plan' => 'required|in:premium-monthly,premium-yearly',
            'payment_method' => 'required|string'
        ]);

        $planType = strpos($request->plan, 'yearly') !== false ? 'yearly' : 'monthly';
        $price = $planType === 'yearly' ? 500000 : 50000;

        // In a real application, you would process payment here
        // For now, we'll just upgrade the user's membership

        $user->upgradeToPremium($planType);

        // Record the transaction
        if (!isset($user->membershipHistory)) {
            $user->membershipHistory = [];
        }

        $user->membershipHistory[] = [
            'date' => now()->toISOString(),
            'plan' => $request->plan,
            'amount' => $price,
            'status' => 'active',
            'payment_method' => $request->payment_method
        ];

        $user->save();

        return redirect()->route('membership.index')
            ->with('success', 'Successfully subscribed to NIKI Premium! Welcome to the club!');
    }

    public function cancel(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'reason' => 'nullable|string'
        ]);

        $user->cancelMembership();

        // Record cancellation in history
        if (!isset($user->membershipHistory)) {
            $user->membershipHistory = [];
        }

        $user->membershipHistory[] = [
            'date' => now()->toISOString(),
            'plan' => $user->membership->plan,
            'amount' => 0,
            'status' => 'cancelled',
            'reason' => $request->reason
        ];

        $user->save();

        return redirect()->route('membership.index')
            ->with('success', 'Your membership has been cancelled. You will retain access until the end of your billing period.');
    }

    public function benefits()
    {
        $cartCount = $this->getCartCount();
        return view('membership.benefits', compact('cartCount'));
    }

    public function checkout($plan)
    {
        if (!in_array($plan, ['premium-monthly', 'premium-yearly'])) {
            abort(404, 'Plan not found');
        }

        $price = $plan === 'premium-yearly' ? 500000 : 50000;
        $period = $plan === 'premium-yearly' ? 'year' : 'month';
        $cartCount = $this->getCartCount();

        return view('membership.checkout', compact('plan', 'price', 'period', 'cartCount'));
    }

    public function processPayment(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'plan' => 'required|in:premium-monthly,premium-yearly',
            'card_number' => 'required|string',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string',
            'card_name' => 'required|string'
        ]);

        // In a real application, you would process the payment with Stripe or other payment gateway
        // For now, we'll simulate a successful payment

        $planType = strpos($request->plan, 'yearly') !== false ? 'yearly' : 'monthly';
        
        $user->upgradeToPremium($planType);

        return redirect()->route('membership.success')
            ->with('success', 'Payment processed successfully! Welcome to NIKI Premium!');
    }

    public function success()
    {
        $user = Auth::user();
        $cartCount = $this->getCartCount();

        return view('membership.success', compact('user', 'cartCount'));
    }

    public function adminIndex()
    {
        $memberships = Membership::with('user')->latest()->get();
        $premiumUsers = User::where('membership_status', 'premium')->count();
        $totalRevenue = Membership::where('status', 'active')->sum('price');

        return view('admin.memberships.index', compact('memberships', 'premiumUsers', 'totalRevenue'));
    }

    private function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }
}