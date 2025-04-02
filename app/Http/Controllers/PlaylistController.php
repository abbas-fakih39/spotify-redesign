<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Créer des données de test pour les playlists
        $playlists = [
            (object)['id' => 1, 'name' => 'Mes favoris', 'description' => 'Tous mes morceaux préférés'],
            (object)['id' => 2, 'name' => 'Soirée', 'description' => 'Playlist pour faire la fête'],
            (object)['id' => 3, 'name' => 'Concentration', 'description' => 'Pour rester concentré pendant le travail']
        ];
        
        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Dans un vrai projet, vous sauvegarderiez dans la base de données
        // Playlist::create($request->all());
        
        // Redirection avec message
        return redirect()->route('playlists.index')
            ->with('success', 'Playlist créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Simulation d'une playlist avec des morceaux
        $playlist = (object)[
            'id' => $id,
            'name' => 'Playlist ' . $id,
            'description' => 'Description de la playlist ' . $id,
            'tracks' => [
                (object)['id' => 1, 'title' => 'Blinding Lights', 'artist' => 'The Weeknd', 'duration' => '3:20'],
                (object)['id' => 2, 'title' => 'Dance Monkey', 'artist' => 'Tones and I', 'duration' => '3:29'],
                (object)['id' => 3, 'title' => 'Shape of You', 'artist' => 'Ed Sheeran', 'duration' => '3:53']
            ]
        ];
        
        return view('playlists.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Simulation d'une playlist
        $playlist = (object)[
            'id' => $id,
            'name' => 'Playlist ' . $id,
            'description' => 'Description de la playlist ' . $id
        ];
        
        return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Dans un vrai projet, vous mettriez à jour dans la base de données
        // $playlist = Playlist::findOrFail($id);
        // $playlist->update($request->all());
        
        // Redirection avec message
        return redirect()->route('playlists.show', $id)
            ->with('success', 'Playlist mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Dans un vrai projet, vous supprimeriez de la base de données
        // Playlist::findOrFail($id)->delete();
        
        // Redirection avec message
        return redirect()->route('playlists.index')
            ->with('success', 'Playlist supprimée avec succès!');
    }
}