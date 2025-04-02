<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        // Créer une playlist Favoris spéciale
        $favoritesPlaylist = (object)[
            'id' => 'favorites',
            'name' => 'Favoris',
            'description' => 'Vos morceaux préférés',
            'image' => 'favorites-cover.jpg',
            'is_special' => true
        ];
        
        // Autres playlists (simulation)
        $playlists = [
            (object)[
                'id' => 1,
                'name' => 'Mes hits',
                'description' => 'Mes morceaux préférés',
                'image' => 'default-playlist.jpg'
            ],
            (object)[
                'id' => 2,
                'name' => 'Soirée',
                'description' => 'Pour faire la fête',
                'image' => 'default-playlist.jpg'
            ],
            (object)[
                'id' => 3,
                'name' => 'Détente',
                'description' => 'Musique calme',
                'image' => 'default-playlist.jpg'
            ]
        ];
        
        return view('library', compact('favoritesPlaylist', 'playlists'));
    }
}