@extends('layouts.app')

@section('content')
<div class="settings-page">
    <div class="settings-header">
        <a href="{{ url()->previous() }}" class="back-button">
            <i class="fas fa-chevron-left"></i>
        </a>
        <h1>PARAMÈTRES</h1>
    </div>

    <div class="settings-content">
        <div class="settings-list">
        <a href="{{ route('profile') }}" class="settings-item">Compte <i class="fas fa-chevron-right"></i></a>
        <a href="#" class="settings-item">Lecture <i class="fas fa-chevron-right"></i></a>
            <a href="#" class="settings-item">Notifications <i class="fas fa-chevron-right"></i></a>
            <a href="#" class="settings-item">Publicités <i class="fas fa-chevron-right"></i></a>
            <a href="#" class="settings-item">Contenu et affichage <i class="fas fa-chevron-right"></i></a>
            <a href="#" class="settings-item">À propos <i class="fas fa-chevron-right"></i></a>
        </div>
        
        <div class="logout-button-container">
            <button class="logout-button">Déconnexion</button>
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
    
    .settings-page {
        min-height: 100vh;
        padding-bottom: 30px;
        background-color: #000;
    }
    
    .settings-header {
        padding: 20px 16px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }
    
    .back-button {
        color: #1DB954;
        font-size: 24px;
        margin-right: 20px;
        text-decoration: none;
    }
    
    .settings-header h1 {
        margin: 0;
        font-size: 22px;
        font-weight: bold;
        letter-spacing: 0.5px;
        color: #fff;
    }
    
    .settings-list {
        padding: 0 16px;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    
    .settings-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        color: #1DB954;
        text-decoration: none;
        font-size: 18px;
        transition: color 0.2s;
    }
    
    .settings-item:hover {
        color: #1ed760;
    }
    
    .settings-item i {
        color: inherit;
        font-size: 14px;
    }
    
    .logout-button-container {
        padding: 20px 16px;
        margin-top: 40px;
    }
    
    .logout-button {
        display: inline-block;
        padding: 8px 16px;
        background-color: transparent;
        color: #fff;
        border: 1px solid #555;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    
    .logout-button:hover {
        background-color: #333;
    }
    
    @media (max-width: 480px) {
        .settings-header h1 {
            font-size: 20px;
        }
        
        .settings-item {
            font-size: 16px;
        }
    }
</style>
@endsection