@extends('layouts.app')

@section('content')
<div class="spotify-library">
    <div class="header">
        <h1 class="title">BIBLIOTHÉQUE</h1>
    </div>
    
    <div class="genre-grid">
        <div class="genre-card">
            <div class="genre-image">
                <img src="{{ asset('images/Mixtape-1996.jpg') }}" alt="RAP ÉTÉ 2025">
            </div>
            <div class="genre-title">RAP ÉTÉ 2025</div>
        </div>
        
        <div class="genre-card">
            <div class="genre-image">
                <img src="{{ asset('images/jazzzz.png') }}" alt="CLASSIC JAZZ">
            </div>
            <div class="genre-title">CLASSIC JAZZ</div>
        </div>
        
        <div class="genre-card">
            <div class="genre-image">
                <img src="{{ asset('images/popari.jpg') }}" alt="POP TENDANCE">
            </div>
            <div class="genre-title">POP TENDANCE</div>
        </div>
        
        <div class="genre-card">
            <div class="genre-image">
                <img src="{{ asset('images/metall.jpeg') }}" alt="METAL ACADEMY">
            </div>
            <div class="genre-title">METAL ACADEMY</div>
        </div>
    </div>
</div>
@endsection