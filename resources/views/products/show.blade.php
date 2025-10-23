@extends('layouts.app')

@section('content')
<div class="container">
    <div class="product-detail-page">
        <div class="product-detail">
            <div class="product-image">
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="product-info">
                <h1>{{ $product->name }}</h1>
                <div class="product-price">{{ $product->price }}</div>
                <div class="product-description">
                    {!! $product->full_description !!}
                </div>
                <div class="product-features">
                    {!! $product->features !!}
                </div>
                <div class="product-actions">
                    <button class="btn btn-primary" id="add-to-cart">Add to Cart</button>
                    <button class="btn btn-outline" id="buy-now">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection