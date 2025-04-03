@extends('layouts.app')

@section('content')
<div class="library-page">
    <div class="library-header">
        <h1>Bibliothèque</h1>
    </div>

    <div class="playlists-container">
        <div class="playlist-section">
            <h2>Favoris</h2>
            <div class="playlist-card special" onclick="window.location.href='{{ route('favorites') }}'">
    <div class="playlist-image">
        <img src="{{ asset('images/covers/favorites-cover.jpeg') }}" alt="Favoris">
    </div>
    <div class="playlist-info">
        <h3>{{ $favoritesPlaylist->name }}</h3>
        <p>{{ $favoritesPlaylist->description }}</p>
    </div>
</div>
        </div>

        <div class="playlist-section">
            <h2>Playlists</h2>
            <div class="playlists-grid">
                @foreach($playlists as $playlist)
                <div class="playlist-card" onclick="window.location.href='{{ route('playlists.show', $playlist->id) }}'">
                    <div class="playlist-image">
                        <img src="{{ asset('images/covers/' . $playlist->image) }}" alt="{{ $playlist->name }}">
                    </div>
                    <div class="playlist-info">
                        <h3>{{ $playlist->name }}</h3>
                        <p>{{ $playlist->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="create-playlist-container">
                <a href="{{ route('playlists.create') }}" class="create-playlist-button">
                    <i class="fas fa-plus"></i> Créer une playlist
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #000;
        color: #fff;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }
    
    .library-page {
        min-height: 100vh;
        padding: 20px 16px 80px 16px;
    }
    
    .library-header {
        margin-bottom: 20px;
    }
    
    .library-header h1 {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
    }
    
    .playlist-section {
        margin-bottom: 30px;
    }
    
    .playlist-section h2 {
        font-size: 18px;
        margin: 15px 0;
    }
    
    .playlists-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 16px;
    }
    
    .playlist-card {
        border-radius: 8px;
        overflow: hidden;
        background-color: #1E1E1E;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .playlist-card:hover {
        background-color: #282828;
    }
    
    .playlist-card.special {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #1E1E1E;
        margin-bottom: 20px;
    }
    
    .playlist-image {
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
    }
    
    .playlist-card.special .playlist-image {
        width: 80px;
        height: 80px;
        min-width: 80px;
        border-radius: 4px;
    }
    
    .playlist-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .playlist-info {
        padding: 12px;
    }
    
    .playlist-card.special .playlist-info {
        padding: 0 0 0 15px;
    }
    
    .playlist-info h3 {
        font-size: 16px;
        margin: 0 0 5px 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .playlist-info p {
        font-size: 14px;
        color: #aaa;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .create-playlist-container {
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }
    
    .create-playlist-button {
        background-color: #fff;
        color: #000;
        border: none;
        border-radius: 50px;
        padding: 12px 20px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: transform 0.2s;
    }
    
    .create-playlist-button:hover {
        transform: scale(1.05);
    }
    
    .create-playlist-button i {
        margin-right: 8px;
    }
    
    @media (max-width: 480px) {
        .playlists-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection