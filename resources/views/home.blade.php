@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-overlay"></div>
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="{{ asset('videos/1017.mp4') }}" type="video/mp4"> 
        </video>
        <div class="hero-content">
            <h1>NICOLE ZEFANYA</h1>
            <p>Official Store & Music Hub</p>
            <div class="hero-cta">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Shop the Drop</a>
                <a href="{{ route('songs.index') }}" class="btn btn-secondary">Stream the Preview</a>
            </div>
        </div>
    </section>

    <!-- Featured Merch -->
    <section id="merch">
        <div class="container">
            <div class="section-title">
                <h2>Featured Merch</h2>
                <p>Limited edition merchandise from NIKI's latest collection</p>
            </div>
            <div class="merch-grid">
                @foreach($featuredProducts as $product)
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
    </section>

    <!-- Featured Songs -->
    <section class="songs-section" id="songs">
        <div class="container">
            <div class="section-title">
                <h2>Featured Songs</h2>
                <p style="color: var(--white);">Stream previews of NIKI's most popular tracks</p>
            </div>
            <div class="songs-carousel">
                @foreach($featuredSongs as $song)
                <div class="song-card">
                    <div class="song-img">
                        <img src="{{ asset('images/songs/' . $song->cover) }}" alt="{{ $song->title }}">
                        <div class="song-play" data-id="{{ $song->id }}">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="song-content">
                        <div class="song-title">{{ $song->title }}</div>
                        <div class="song-album">{{ $song->album }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Upcoming Concerts -->
    <section class="concerts-section" id="tour">
        <div class="container">
            <div class="section-title">
                <h2>Upcoming Concerts</h2>
                <p>Information about NIKI's upcoming tour dates</p>
            </div>
            <div class="concerts-list">
                @foreach($upcomingConcerts as $concert)
                <div class="concert-card">
                    <div class="concert-img">
                        <img src="{{ asset('images/concerts/' . $concert->image) }}" alt="{{ $concert->title }}">
                    </div>
                    <div class="concert-content">
                        <h3 class="concert-title">{{ $concert->title }}</h3>
                        <div class="concert-details">{{ $concert->venue }} • {{ $concert->date }}</div>
                        <div class="concert-note">{{ $concert->note }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="about-bg-carousel">
            <div class="about-bg-slides">
                <div class="about-bg-slide" style="background-image: url('{{ asset('images/niki1.jpeg') }}');"></div>
                <div class="about-bg-slide" style="background-image: url('{{ asset('images/niki2.jpg') }}');"></div>
                <div class="about-bg-slide" style="background-image: url('{{ asset('images/niki3.jpg') }}');"></div>
                <div class="about-bg-slide" style="background-image: url('{{ asset('images/niki4.jpg') }}');"></div>
                <div class="about-bg-slide" style="background-image: url('{{ asset('images/niki5.jpg') }}');"></div>
                <div class="about-bg-slide" style="background-image: url('{{ asset('images/niki6.jpg') }}');"></div>
            </div>
        </div>
        
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h1 class="about-name">NIKI - NICOLE ZEFANYA</h1>
                    <p class="about-subtitle">Singer, Songwriter, Producer</p>
                    <p class="about-bio">
                        Nicole Zefanya (professional name NIKI) is an Indonesian singer-songwriter and producer born on 24 January 1999 in Jakarta. She rose to international attention through online covers and original uploads, later signing with the influential label 88rising.
                    </p>
                    <p class="about-bio">
                        NIKI's music blends alternative pop and R&B into cinematic, intimate songwriting that bridges Indonesian identity and global pop culture. Her career includes studio albums and singles that have placed her on major soundtracks and international charts.
                    </p>
                </div>
                <div class="vinyl-container">
                    <div class="cassette-player" id="cassette-player">
                        <video class="cassette-video" autoplay muted loop playsinline>
                            <source src="{{ asset('videos/1017.mp4') }}" type="video/mp4">
                        </video>
                        <div class="cassette-center">
                            <i class="fas fa-music"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact NIKI Team</h2>
                <p>Send a message to NIKI's management team</p>
            </div>
            <div class="contact-form">
                <form id="contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="contact-name">Your Name</label>
                        <input type="text" id="contact-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Your Email</label>
                        <input type="email" id="contact-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Your Message</label>
                        <textarea id="contact-message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                </form>
            </div>
        </div>
    </section>
@endsection