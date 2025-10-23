@extends('layouts.app')

@section('content')
<div class="container">
    <div class="cart-page">
        <h1>Your Shopping Cart</h1>
        
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be populated by JavaScript -->
        </div>
        
        <div class="cart-summary">
            <div class="cart-subtotal">
                <span>Subtotal:</span>
                <span id="cart-subtotal-price">Rp 0</span>
            </div>
            <button class="checkout-btn" id="checkout-btn">Secure Checkout</button>
        </div>
    </div>
</div>
@endsection