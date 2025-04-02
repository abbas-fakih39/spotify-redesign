@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: black;
        color: white;
        font-family: 'Arial', sans-serif;
    }

    .profile-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }

    .profile-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 300px;
        background: linear-gradient(to bottom, #1DB954 50%, black 50%);
        z-index: -1;
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-color: #333;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .profile-avatar img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .username {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .subscription-badge {
        display: inline-block;
        background-color: #1DB954;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 1.2rem;
        margin-top: 30px;
        margin-bottom: 15px;
        text-align: left;
    }

    .music-moment-card {
        background-color: rgba(255,255,255,0.1);
        border-radius: 10px;
        padding: 15px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .music-moment-card img {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        margin-right: 15px;
    }

    .music-moment-card .more-options {
        margin-left: auto;
        color: white;
        opacity: 0.7;
    }

    .favorite-artists {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .artist-btn {
        background-color: rgba(255,255,255,0.1);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        text-transform: uppercase;
    }

    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: black;
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .bottom-nav-item {
        text-align: center;
        color: white;
        opacity: 0.5;
    }

    .bottom-nav-item.active {
        opacity: 1;
    }
</style>

<div class="profile-container">
    <div class="profile-background"></div>
    
    <div class="profile-avatar">
        <img src="{{ asset('images/default-avatar.jpg') }}" alt="Profile Picture">
    </div>
    
    <div class="username">{{ Auth::user()->name }}</div>
    
    <div class="subscription-badge">
        Abonnement FREE
    </div>

    <div class="section-title">Musique du moment</div>
    <div class="music-moment-card">
        <img src="{{ asset('images/tracks/bissap.jpeg') }}" alt="Bissap">
        <div>
            <strong>Bissap</strong>
            <p>Green Montana</p>
        </div>
        <div class="more-options">...</div>
    </div>

    <div class="section-title">Artistes préférés</div>
    <div class="favorite-artists">
        @php
            $artists = ['SDM', 'SABRINA CARPENTER', 'ROSÉ', 'PLAYBOI CARTI', 'THE WEEKND', 'GAZO'];
        @endphp
        @foreach($artists as $artist)
            <button class="artist-btn">{{ $artist }}</button>
        @endforeach
    </div>
</div>

<div class="bottom-nav">
    <div class="bottom-nav-item">
        <i class="fas fa-search"></i>
        <div>Rechercher</div>
    </div>
    <div class="bottom-nav-item active">
        <i class="fas fa-home"></i>
        <div>Accueil</div>
    </div>
    <div class="bottom-nav-item">
        <i class="fas fa-book"></i>
        <div>Bibliothèque</div>
    </div>
</div>
@endsection