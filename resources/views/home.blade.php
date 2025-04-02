@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1>Bonjour, {{ Auth::user()->name }}</h1>
            <p>Bienvenue sur votre nouvelle expérience Spotify.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <h2>Recommandations pour vous</h2>
            <div class="row">
                @forelse($tracks as $track)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $track->title }}</h5>
                                <p class="card-text">{{ $track->artist }}</p>
                                <a href="{{ route('player.show', $track->id) }}" class="btn btn-primary">Écouter</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>Aucune recommandation disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Vos playlists</h2>
            <div class="row">
                @forelse($playlists as $playlist)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $playlist->name }}</h5>
                                <p class="card-text">{{ $playlist->description }}</p>
                                <a href="{{ route('playlists.show', $playlist->id) }}">Voir</a>                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>Vous n'avez pas encore créé de playlists.</p>
                        <a href="{{ route('playlists.create') }}" class="btn btn-success">Créer une playlist</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection