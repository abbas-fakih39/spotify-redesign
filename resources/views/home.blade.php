@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: black;
        color: white;
        font-family: 'Arial', sans-serif;
    }

    .hero-section {
        position: relative;
        background-color: #1DB954;
        height: 500px;
        overflow: hidden;
    }

    .album-cover {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 10px 50px rgba(0,0,0,0.5);
        border-radius: 10px;
        overflow: hidden;
    }
    .page-content {
    padding-bottom: 120px; /* Mini-player (56px) + Navigation (55px) + Marge (9px) */
}
    .album-cover img {
        width: 100%;
        height: auto;
        display: block;
    }

    .overlay-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 3rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .album-cover:hover .overlay-text {
        opacity: 1;
    }

    .hero-image {
        position: absolute;
        bottom: 0;
        right: 0;
        max-width: 50%;
        z-index: 1;
        filter: grayscale(0.2) contrast(1.2);
        mix-blend-mode: multiply;
    }

    .discover-btn {
        background-color: white;
        color: black;
        padding: 10px 30px;
        border-radius: 50px;
        text-transform: uppercase;
        font-weight: bold;
        margin-top: -30px;
        position: relative;
        z-index: 10;
    }

    .section-title {
        font-size: 2rem;
        margin-top: 30px;
        margin-bottom: 20px;
        color: white;
    }

    .recommendations-container {
        display: flex;
        overflow-x: auto;
        gap: 15px;
        padding: 20px 0;
    }

    .recommendation-card {
        background-color: rgba(255,255,255,0.1);
        border-radius: 10px;
        min-width: 200px;
        min-height: 200px;
        padding: 0;
        overflow: hidden;
    }

    .recommendation-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .genre-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .genre-btn {
        background-color: rgba(255,255,255,0.1);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        text-transform: uppercase;
    }

    .genre-btn:hover {
        background-color: rgba(255,255,255,0.2);
    }
</style>

<div class="container-fluid p-0">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="album-cover">
                <img src="{{ asset('images/covers/iammusic.jpg') }}" alt="Album Cover">
            </div>
            <div class="text-center">
                <button class="btn discover-btn">Découvrir</button>
            </div>
        </div>
        <img src="{{ asset('path/to/artist-image.jpg') }}" alt="Artist" class="hero-image">
    </div>

    <!-- Recommandations pour vous -->
    <div class="container mt-4">
        <h2 class="section-title">Pour vous</h2>
        <div class="recommendations-container">
           

            
                <div class="recommendation-card">
                    <img src="{{ asset('images/tracks/weeknd.jpg') }}" alt="Track Recommendation">
                </div>
                <div class="recommendation-card">
                    <img src="{{ asset('images/tracks/weeknd.jpg') }}" alt="Track Recommendation">
                </div>
                
        </div>
    </div>

    <!-- Rechercher par genre -->
    <div class="container mt-4">
        <h2 class="section-title">Rechercher par genre</h2>
        <div class="genre-buttons">
            @php
                $genres = ['ELECTRO', 'RAP', 'METAL', 'REGGAE', 'JAZZ', 'ROCK', 'LOFI'];
            @endphp
            @foreach($genres as $genre)
                <button class="genre-btn">{{ $genre }}</button>
            @endforeach
        </div>
    </div>
</div>
@endsection