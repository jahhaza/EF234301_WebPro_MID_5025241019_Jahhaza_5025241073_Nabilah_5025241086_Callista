@extends('layouts.app')

@section('content')
<div class="container">
    <div class="order-details">
        <div class="order-header">
            <h1>Order Confirmation</h1>
            <p class="order-id">Order #{{ $order->id }}</p>
        </div>
        
        <div class="order-info">
            <div class="customer-info">
                <h3>Customer Information</h3>
                <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
            </div>
            
            <div class="order-items">
                <h3>Order Items</h3>
                @foreach($order->items as $item)
                <div class="order-item">
                    <span class="item-name">{{ $item->product->name }}</span>
                    <span class="item-quantity">Qty: {{ $item->quantity }}</span>
                    <span class="item-price">{{ $item->price }}</span>
                </div>
                @endforeach
            </div>
            
            <div class="order-total">
                <h3>Total: {{ $order->total_amount }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection