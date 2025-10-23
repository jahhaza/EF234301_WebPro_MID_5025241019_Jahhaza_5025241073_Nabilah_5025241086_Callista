@extends('layouts.app')

@section('content')
<div class="container">
    <div class="songs-page">
        <div class="section-title">
            <h2>NIKI's Discography</h2>
            <p>Stream NIKI's complete music collection</p>
        </div>
        
        <div class="spotify-playlist">
            <div class="playlist-header">
                <div class="playlist-number">#</div>
                <div class="playlist-cover"></div>
                <div class="playlist-title">TITLE</div>
                <div class="playlist-album">ALBUM</div>
                <div class="playlist-duration">DURATION</div>
                <div class="playlist-actions"></div>
            </div>
            <div id="playlist-items">
                @foreach($songs as $index => $song)
                <div class="playlist-item" data-id="{{ $song->id }}">
                    <div class="playlist-number">{{ $index + 1 }}</div>
                    <div class="playlist-cover">
                        <img src="{{ asset('images/songs/' . $song->cover) }}" alt="{{ $song->title }}">
                    </div>
                    <div class="playlist-title">{{ $song->title }}</div>
                    <div class="playlist-album">{{ $song->album }}</div>
                    <div class="playlist-duration">{{ $song->duration }}</div>
                    <div class="playlist-actions">
                        <div class="playlist-play-btn" data-id="{{ $song->id }}">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection