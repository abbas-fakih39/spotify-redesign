<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Spotify Redesign') }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    
    <style>
        :root {
            --spotify-green: #1ED760;
            --spotify-black: #121212;
            --spotify-dark-black: #000000;
            --spotify-white: #FFFFFF;
            --spotify-purple-gradient-start: #7B68EE;
            --spotify-purple-gradient-end: #2E3A59;
        }
        
        body {
            background-color: var(--spotify-black);
            color: var(--spotify-white);
            font-family: 'Circular', 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .header {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        
        .nav-container {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: var(--spotify-dark-black);
            display: flex;
            justify-content: space-around;
            padding: 12px 0;
            border-top: 1px solid #333;
        }
        
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--spotify-white);
            text-decoration: none;
            font-size: 12px;
        }
        
        .nav-item i {
            font-size: 20px;
            margin-bottom: 4px;
        }
        
        .nav-item.active {
            color: var(--spotify-green);
        }
        
        .content {
            padding: 20px;
            padding-bottom: 80px; 
        }
        
        .genre-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            padding: 0 15px;
        }
        
        .genre-card {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            aspect-ratio: 1/1;
        }
        
        .genre-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .genre-title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            padding: 8px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
        
        .spotify-player {
            height: 100vh;
            background: linear-gradient(to bottom right, var(--spotify-purple-gradient-start), var(--spotify-purple-gradient-end));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .track-artwork {
            width: 260px;
            height: 260px;
            position: relative;
            margin-bottom: 40px;
        }
        
        .progress-ring {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            border: 8px solid transparent;
            border-right-color: var(--spotify-green);
            border-top-color: var(--spotify-green);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }
        
        .progress-ring img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .track-info {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .track-title {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .track-subtitle, .track-artist {
            color: #ccc;
            margin: 0;
        }
        
        .progress-container {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 20px 0;
            padding: 0 15px;
        }
        
        .progress-bar {
            flex-grow: 1;
            height: 4px;
            background-color: #333;
            margin: 0 10px;
            position: relative;
            border-radius: 2px;
        }
        
        .progress-filled {
            position: absolute;
            height: 100%;
            width: 30%;
            background-color: var(--spotify-green);
            border-radius: 2px;
        }
        
        .time {
            font-size: 12px;
            color: #ccc;
        }
        
        .player-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px 0;
        }
        
        .control-button {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            margin: 0 15px;
            cursor: pointer;
        }
        
        .play-pause {
            font-size: 40px;
            color: var(--spotify-white);
            background-color: var(--spotify-dark-black);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .search-add-container {
            display: flex;
            justify-content: space-between;
            padding: 15px;
        }
        
        .search-button, .add-button {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
        }
        .notification {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(29, 185, 84, 0.9);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        animation: fadeInOut 3s forwards;
    }
    
    @keyframes fadeInOut {
        0% { opacity: 0; transform: translate(-50%, 20px); }
        15% { opacity: 1; transform: translate(-50%, 0); }
        85% { opacity: 1; transform: translate(-50%, 0); }
        100% { opacity: 0; transform: translate(-50%, -20px); }
    }
        
        .notification-container {
            position: relative;
            border: 1px dashed #8A2BE2;
            border-radius: 5px;
            padding: 5px 10px;
        }
        
        .notification-icon {
            color: var(--spotify-white);
            font-size: 20px;
     .spotify-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #333;
    color: white;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    z-index: 1000;
    transform: translateX(120%);
    transition: transform 0.3s ease;
    display: flex;
    align-items: center;
}

.spotify-notification.show {
    transform: translateX(0);
}

.spotify-notification.success {
    border-left: 4px solid var(--spotify-green);
}

.spotify-notification.error {
    border-left: 4px solid #E53935;
}

.spotify-notification i {
    margin-right: 10px;
    font-size: 20px;
}

.spotify-notification.success i {
    color: var(--spotify-green);
}

.spotify-notification.error i {
    color: #E53935;
}

.notification-content {
    display: flex;
    align-items: center;
}
/* Search page styles */
.search-input-container {
    position: relative;
    margin: 20px 0;
}

.search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
}

.search-input {
    width: 100%;
    padding: 12px 12px 12px 45px;
    background-color: #333;
    border: none;
    border-radius: 20px;
    color: white;
    font-size: 16px;
}

.search-input:focus {
    outline: none;
    background-color: #444;
}

.search-placeholder, .no-results {
    text-align: center;
    color: #999;
    margin-top: 30px;
}

.results-list {
    margin-top: 20px;
}

.result-item {
    display: flex;
    align-items: center;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.result-item:hover {
    background-color: #333;
}

.result-icon {
    width: 40px;
    height: 40px;
    background-color: #333;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
}

.result-info {
    flex: 1;
}

.result-title {
    font-weight: bold;
    margin-bottom: 2px;
}

.result-subtitle {
    font-size: 14px;
    color: #aaa;
}

.result-type {
    font-size: 12px;
    color: #888;
    text-transform: capitalize;
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-top: 15px;
}

.category-card {
    border-radius: 8px;
    padding: 20px;
    height: 100px;
    display: flex;
    align-items: flex-end;
    cursor: pointer;
    transition: transform 0.2s;
}

.category-card:hover {
    transform: scale(1.02);
}
        }
    
    </style>
       @yield('styles')
</head>
<body>
    <div class="header">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/Spotify logo.svg') }}" alt="Spotify Logo" height="30">
        </a>
        <a href="{{ route('settings') }}" class="profile-link">
    <i class="fas fa-user-circle" style="font-size: 24px; color: white;"></i>
</a>
    </div>
    
    <div class="content">
        @yield('content')
    </div>
    
    <div class="nav-container">
    <a href="{{ route('home') }}" class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Accueil</span>
        </a>
        <a href="{{ route('search') }}" class="nav-item {{ Request::routeIs('search') ? 'active' : '' }}">
            <i class="fas fa-search"></i>
            <span>Rechercher</span>
        </a>
        <a href="{{ route('library') }}" class="nav-item {{ Request::routeIs('library') ? 'active' : '' }}">
            <i class="fas fa-book"></i>
            <span>Bibliothèque</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>