<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    
    public function index()
    {
        $playlists = [
            (object)['id' => 1, 'name' => 'Mes favoris', 'description' => 'Tous mes morceaux préférés'],
            (object)['id' => 2, 'name' => 'Soirée', 'description' => 'Playlist pour faire la fête'],
            (object)['id' => 3, 'name' => 'Concentration', 'description' => 'Pour rester concentré pendant le travail']
        ];
        
        return view('playlists.index', compact('playlists'));
    }

    
    public function create()
    {
        return view('playlists.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        
        return redirect()->route('playlists.index')
            ->with('success', 'Playlist créée avec succès!');
    }

    public function show($id)
    {
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

    
    public function edit($id)
    {
        $playlist = (object)[
            'id' => $id,
            'name' => 'Playlist ' . $id,
            'description' => 'Description de la playlist ' . $id
        ];
        
        return view('playlists.edit', compact('playlist'));
    }

   
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

       
        return redirect()->route('playlists.show', $id)
            ->with('success', 'Playlist mise à jour avec succès!');
    }

    
    public function destroy($id)
    {
        return redirect()->route('playlists.index')
            ->with('success', 'Playlist supprimée avec succès!');
    }
}