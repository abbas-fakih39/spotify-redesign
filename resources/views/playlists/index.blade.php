@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Vos playlists</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('playlists.create') }}" class="btn btn-success">Créer une playlist</a>
        </div>
    </div>

    <div class="row">
        @forelse($playlists as $playlist)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $playlist->name }}</h5>
                        <p class="card-text">{{ $playlist->description }}</p>
                        <a href="{{ route('playlists.show', $playlist->id) }}" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>Vous n'avez pas encore créé de playlists.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection