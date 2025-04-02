@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Modifier la playlist</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la playlist</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $playlist->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $playlist->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('playlists.show', $playlist->id) }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection