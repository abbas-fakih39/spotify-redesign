<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tracks = [
            (object)['id' => 1, 'title' => 'Blinding Lights', 'artist' => 'The Weeknd'],
            (object)['id' => 2, 'title' => 'Dance Monkey', 'artist' => 'Tones and I'],
            (object)['id' => 3, 'title' => 'Shape of You', 'artist' => 'Ed Sheeran']
        ];
        
        $playlists = [
            (object)['id' => 1, 'name' => 'Ma playlist #1', 'description' => 'Mes titres préférés'],
            (object)['id' => 2, 'name' => 'Soirée', 'description' => 'Pour faire la fête'],
            (object)['id' => 3, 'name' => 'Détente', 'description' => 'Musique calme pour se relaxer']
        ];
        
       
        
        return view('home', compact('tracks', 'playlists'));
    }
    
    public function search()
    {
        return view('search');
    }
    
    public function favorites()
    {
        return view('favorites');
    }
}