@extends('layouts.app')

@section('content')
<div class="spotify-player">
    <div class="player-content">
        <div class="track-artwork">
            <div class="progress-ring">
                <img src="{{ asset('images/covers/lofi.jpg') }}" alt="Lofi Cover">
            </div>
        </div>
        
        <div class="track-info">
            <h2 class="track-title">lofi</h2>
            <p class="track-subtitle">lofi song</p>
            <p class="track-artist">lofi girl</p>
        </div>
        
        <div class="progress-container">
            <span class="time current">0:00</span>
            <div class="progress-bar">
                <div class="progress-filled"></div>
            </div>
            <span class="time total">0:00</span>
        </div>
        
        <div class="player-controls">
            <button class="control-button shuffle"><i class="fas fa-random"></i></button>
            <button class="control-button prev"><i class="fas fa-step-backward"></i></button>
            <button class="control-button play-pause"><i class="fas fa-play"></i></button>
            <button class="control-button next"><i class="fas fa-step-forward"></i></button>
            <button class="control-button repeat"><i class="fas fa-redo-alt"></i></button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/player.js') }}"></script>
@endsection