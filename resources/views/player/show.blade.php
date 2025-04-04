@extends('layouts.app')

@section('content')


    <div class="player-content">
        <div class="album-cover">
            <img src="{{ asset('images/covers/default-album.jpg') }}" id="album-cover" alt="Album Cover">
        </div>
        
        <div class="track-info">
            <h2 id="track-title">{{ $track->title }}</h2>
            <p id="track-artist">{{ $track->artist }}</p>
        </div>
        
        <div class="progress-container">
            <div class="progress-bar" id="progress-bar">
                <div class="progress-fill" id="progress-fill"></div>
            </div>
            <div class="time-info">
                <span id="current-time">0:00</span>
                <span id="duration">3:00</span>
            </div>
        </div>
        
        <div class="player-controls">
            <button id="shuffle-button" class="control-button">
                <i class="fas fa-random"></i>
            </button>
            <button id="prev-button" class="control-button">
                <i class="fas fa-step-backward"></i>
            </button>
            <button id="play-pause-button" class="control-button play-button">
                <i class="fas fa-play"></i>
            </button>
            <button id="next-button" class="control-button">
                <i class="fas fa-step-forward"></i>
            </button>
            <button id="repeat-button" class="control-button">
                <i class="fas fa-redo-alt"></i>
            </button>
        </div>
    </div>
    
    <div class="nav-container">
        <a href="{{ route('search') }}" class="nav-item">
            <i class="fas fa-search"></i>
            <span>Rechercher</span>
        </a>
        <a href="{{ route('home') }}" class="nav-item active">
            <i class="fas fa-home"></i>
            <span>Accueil</span>
        </a>
        <a href="{{ route('favorites') }}" class="nav-item">
            <i class="fas fa-heart"></i>
            <span>Favoris</span>
        </a>
    </div>
</div>
@endsection

@section('styles')
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    
    .spotify-player {
        background: linear-gradient(135deg, #7D4CC8, #2E2B5F);
        min-height: 100vh;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        position: relative;
        padding-bottom: 70px;
    }
    
    .player-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
    }
    
    .player-header i {
        font-size: 24px;
        color: white;
    }
    
    .player-content {
        padding: 0 15px;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .album-cover {
    margin: 20px auto;
    width: 150px;
    height: 150px; 
    border-radius: 50%; 
    overflow: hidden;
    display: flex; 
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
}

.album-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}


    
   
    .track-info {
        text-align: center;
        margin: 20px 0;
    }
    
    .track-info h2 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 5px 0;
    }
    
    .track-info p {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
    }
    
    
    .progress-container {
        margin: 25px 0;
    }
    
    .progress-bar {
        height: 4px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 2px;
        position: relative;
        cursor: pointer;
    }
    
    .progress-fill {
        position: absolute;
        height: 100%;
        width: 0%;
        background-color: #1DB954;
        border-radius: 2px;
    }
    
    .time-info {
        display: flex;
        justify-content: space-between;
        margin-top: 8px;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.7);
    }
    
   
    .player-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 25px 0;
    }
    
    .control-button {
        background: none;
        border: none;
        color: white;
        padding: 10px;
        margin: 0 5px;
        cursor: pointer;
        font-size: 16px;
    }
    
    .control-button.active {
        color: #1DB954;
    }
    
    .play-button {
        background-color: white;
        color: black;
        font-size: 18px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 15px;
    }
    
   
    .nav-container {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #000;
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        z-index: 100;
    }
    
    .nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #aaa;
        text-decoration: none;
        font-size: 12px;
    }
    
    .nav-item i {
        font-size: 18px;
        margin-bottom: 4px;
    }
    
    .nav-item.active {
        color: white;
    }
    
    
    @media (max-width: 480px) {
        .album-cover {
            width: 50%;
        }
        
        .player-controls {
            padding: 0 5px;
        }
        
        .control-button {
            margin: 0 3px;
            padding: 8px;
        }
        
        .play-button {
            margin: 0 10px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const playPauseBtn = document.getElementById('play-pause-button');
    const prevBtn = document.getElementById('prev-button');
    const nextBtn = document.getElementById('next-button');
    const shuffleBtn = document.getElementById('shuffle-button');
    const repeatBtn = document.getElementById('repeat-button');
    const progressFill = document.getElementById('progress-fill');
    const progressBar = document.getElementById('progress-bar');
    const currentTimeEl = document.getElementById('current-time');
    const durationEl = document.getElementById('duration');
    const albumCover = document.getElementById('album-cover');
    const trackTitle = document.getElementById('track-title');
    const trackArtist = document.getElementById('track-artist');
    
    
    let isPlaying = false;
    let isShuffle = false;
    let isRepeat = false;
    let duration = 180; 
    let currentTime = 0;
    let interval;
    
    
    const playlist = [
        { id: {{ $track->id }}, title: "{{ $track->title }}", artist: "{{ $track->artist }}", cover: "default-album.jpg", duration: 180 },
        { id: 2, title: "Dance Monkey", artist: "Tones and I", cover: "default-album.jpg", duration: 210 },
        { id: 3, title: "Shape of You", artist: "Ed Sheeran", cover: "default-album.jpg", duration: 230 }
    ];
    
    let currentTrackIndex = 0;
    
    
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' + secs : secs}`;
    }
    
    durationEl.textContent = formatTime(duration);
    currentTimeEl.textContent = formatTime(currentTime);
    
    function updateProgress() {
        const percent = (currentTime / duration) * 100;
        progressFill.style.width = `${percent}%`;
        currentTimeEl.textContent = formatTime(currentTime);
    }
    
    function play() {
        isPlaying = true;
        playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        
        clearInterval(interval);
        interval = setInterval(() => {
            if (currentTime < duration) {
                currentTime++;
                updateProgress();
            } else {
                if (isRepeat) {
                    currentTime = 0;
                    updateProgress();
                } else {
                    nextTrack();
                }
            }
        }, 1000);
    }
    
    function pause() {
        isPlaying = false;
        playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        clearInterval(interval);
    }
    
    
    function loadTrack(index) {
        if (index < 0 || index >= playlist.length) return;
        
        currentTrackIndex = index;
        const track = playlist[index];
        
        trackTitle.textContent = track.title;
        trackArtist.textContent = track.artist;
        albumCover.src = "{{ asset('images/covers') }}/" + track.cover;
        duration = track.duration;
        currentTime = 0;
        
        durationEl.textContent = formatTime(duration);
        currentTimeEl.textContent = formatTime(currentTime);
        updateProgress();
        
        if (isPlaying) {
            clearInterval(interval);
            play();
        }
    }
    
   
    function prevTrack() {
        if (currentTime > 5) {
            currentTime = 0;
            updateProgress();
        } else {
            let prevIndex = currentTrackIndex - 1;
            if (prevIndex < 0) prevIndex = playlist.length - 1;
            loadTrack(prevIndex);
        }
    }
    
    function nextTrack() {
        if (isShuffle) {
            let randomIndex = Math.floor(Math.random() * playlist.length);
            loadTrack(randomIndex);
        } else {
            let nextIndex = currentTrackIndex + 1;
            if (nextIndex >= playlist.length) nextIndex = 0;
            loadTrack(nextIndex);
        }
    }
    
    
    playPauseBtn.addEventListener('click', function() {
        if (isPlaying) {
            pause();
        } else {
            play();
        }
    });
    
    prevBtn.addEventListener('click', prevTrack);
    nextBtn.addEventListener('click', nextTrack);
    
    shuffleBtn.addEventListener('click', function() {
        isShuffle = !isShuffle;
        this.classList.toggle('active');
    });
    
    repeatBtn.addEventListener('click', function() {
        isRepeat = !isRepeat;
        this.classList.toggle('active');
    });
    
    progressBar.addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const percent = (e.clientX - rect.left) / rect.width;
        currentTime = Math.floor(percent * duration);
        updateProgress();
    });
    
    loadTrack(0);
    window.playerControls.updateTrackInfo(
    {{ $track->id }}, 
    "{{ $track->title }}", 
    "{{ $track->artist }}", 
    "{{ $track->cover ?? 'default-album.jpg' }}", 
    isPlaying
);

playPauseBtn.addEventListener('click', function() {
    if (isPlaying) {
        window.playerControls.pause();
    } else {
        window.playerControls.play();
    }
});
});
</script>
@endsection