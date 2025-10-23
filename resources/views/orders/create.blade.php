@extends('layouts.app')

@section('content')
<div class="container">
    <div class="checkout-page">
        <h1>Checkout</h1>
        
        <div class="checkout-content">
            <div class="checkout-form">
                <h3>Shipping Information</h3>
                <form id="checkout-form">
                    @csrf
                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    
                    <div class="location-form">
                        <h4>Shipping Address</h4>
                        <div class="location-row">
                            <div class="location-field">
                                <label for="province">Province</label>
                                <input type="text" id="province" name="province" required>
                            </div>
                            <div class="location-field">
                                <label for="city">City/Regency</label>
                                <input type="text" id="city" name="city" required>
                            </div>
                        </div>
                        <div class="location-row">
                            <div class="location-field">
                                <label for="district">District</label>
                                <input type="text" id="district" name="district" required>
                            </div>
                            <div class="location-field">
                                <label for="village">Village</label>
                                <input type="text" id="village" name="village" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="street-address">Full Address</label>
                            <textarea id="street-address" name="street_address" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="notes">Notes (Optional)</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Continue to Payment</button>
                </form>
            </div>
            <div class="checkout-summary">
                <h3>Order Summary</h3>
                <div class="checkout-items" id="checkout-items">
                    <!-- Checkout items will be populated by JavaScript -->
                </div>
                <div class="checkout-total">
                    <span>Total:</span>
                    <span id="checkout-total-price">Rp 0</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection