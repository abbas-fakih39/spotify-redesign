@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>{{ $playlist->name }}</h1>
            <p>{{ $playlist->description }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Titres</h2>
            <div class="list-group">
                @forelse($playlist->tracks as $track)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">{{ $track->title }}</h5>
                            <p class="mb-1">{{ $track->artist }}</p>
                        </div>
                        <div>
                            <span class="badge bg-primary rounded-pill">{{ $track->duration }}</span>
                            <a href="{{ route('player.show', $track->id) }}" class="btn btn-sm btn-primary ms-2">Écouter</a>
                        </div>
                    </div>
                @empty
                    <p>Cette playlist ne contient aucun titre.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <a href="{{ route('playlists.index') }}" class="btn btn-secondary">Retour aux playlists</a>
            <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette playlist ?')">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection