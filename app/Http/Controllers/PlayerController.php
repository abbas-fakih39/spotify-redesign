<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function show($id)
    {
        $track = (object)[
            'id' => $id,
            'title' => 'Blinding Lights',
            'artist' => 'The Weeknd',
            'album' => 'After Hours',
            'duration' => '3:20',
            'cover' => 'default-album.png'
        ];

        $titles = [
            '1' => 'Blinding Lights',
            '2' => 'Dance Monkey',
            '3' => 'Shape of You'
        ];

        $artists = [
            '1' => 'The Weeknd',
            '2' => 'Tones and I',
            '3' => 'Ed Sheeran'
        ];

        if (isset($titles[$id]) && isset($artists[$id])) {
            $track->title = $titles[$id];
            $track->artist = $artists[$id];
        }

        return view('player.show', compact('track'));
    }

    public function trackView($id)
    {
        $track = (object)[
            'id' => $id,
            'title' => 'Blinding Lights',
            'artist' => 'The Weeknd',
            'album' => 'After Hours',
            'duration' => '3:20',
            'cover' => 'default-album.png'
        ];

        $titles = [
            '1' => 'Blinding Lights',
            '2' => 'Dance Monkey',
            '3' => 'Shape of You'
        ];

        $artists = [
            '1' => 'The Weeknd',
            '2' => 'Tones and I',
            '3' => 'Ed Sheeran'
        ];

        if (isset($titles[$id]) && isset($artists[$id])) {
            $track->title = $titles[$id];
            $track->artist = $artists[$id];
        }

        return view('track.view', compact('track'));
    }
}