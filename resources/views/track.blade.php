@extends('layouts.app')

@section('content')
<div class="spotify-track-page">
    <div class="search-add-container">
        <button class="search-button"><i class="fas fa-search"></i></button>
        <button class="add-button"><i class="fas fa-plus"></i></button>
    </div>
    
    <div class="progress-container">
        <span class="time current">00:00</span>
        <div class="progress-bar">
            <div class="progress-filled"></div>
        </div>
        <span class="time total">00:00</span>
    </div>
    
    <div class="player-controls">
        <button class="control-button shuffle"><i class="fas fa-random"></i></button>
        <button class="control-button prev"><i class="fas fa-step-backward"></i></button>
        <button class="control-button play-pause"><i class="fas fa-play"></i></button>
        <button class="control-button next"><i class="fas fa-step-forward"></i></button>
        <button class="control-button repeat"><i class="fas fa-redo-alt"></i></button>
    </div>
</div>
@endsection