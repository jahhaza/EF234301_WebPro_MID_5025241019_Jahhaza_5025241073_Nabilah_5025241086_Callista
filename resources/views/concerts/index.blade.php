@extends('layouts.app')

@section('content')
<div class="container">
    <div class="concerts-page">
        <div class="section-title">
            <h2>Tour Dates</h2>
            <p>NIKI's upcoming concerts and events</p>
        </div>
        
        <div class="concerts-list">
            @foreach($concerts as $concert)
            <div class="concert-card">
                <div class="concert-img">
                    <img src="{{ asset('images/concerts/' . $concert->image) }}" alt="{{ $concert->title }}">
                </div>
                <div class="concert-content">
                    <h3 class="concert-title">{{ $concert->title }}</h3>
                    <div class="concert-details">{{ $concert->venue }} • {{ $concert->date }}</div>
                    <div class="concert-note">{{ $concert->note }}</div>
                    @if($concert->ticket_link)
                    <a href="{{ $concert->ticket_link }}" class="btn btn-primary" target="_blank">Get Tickets</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection