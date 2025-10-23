@extends('layouts.app')

@section('content')
<div class="container">
    <div class="products-header">
        <div class="section-title">
            <h2>NIKI Merchandise</h2>
            <p>Official merchandise and albums</p>
        </div>
    </div>

    <div class="merch-grid">
        @foreach($products as $product)
        <div class="merch-card">
            @if($product->badge)
            <div class="merch-badge">{{ $product->badge }}</div>
            @endif
            <div class="merch-img">
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="merch-content">
                <h3>{{ $product->name }}</h3>
                <p class="merch-description">{{ $product->description }}</p>
                <div class="merch-price">{{ $product->price }}</div>
                <div class="merch-actions">
                    <button class="btn-outline view-details" data-id="{{ $product->id }}">View Details</button>
                    <div class="quick-add" data-id="{{ $product->id }}">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection