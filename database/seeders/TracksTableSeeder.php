<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Track;

class TracksTableSeeder extends Seeder
{
    public function run()
    {
        $tracks = [
            [
                'title' => 'Shape of You',
                'artist' => 'Ed Sheeran',
                'album' => 'Divide',
                'duration_seconds' => 234,
                'genre' => 'Pop'
            ],
            [
                'title' => 'Blinding Lights',
                'artist' => 'The Weeknd',
                'album' => 'After Hours',
                'duration_seconds' => 200,
                'genre' => 'Pop'
            ],
            [
                'title' => 'Dance Monkey',
                'artist' => 'Tones and I',
                'album' => 'The Kids Are Coming',
                'duration_seconds' => 210,
                'genre' => 'Pop'
            ],
            // Ajoutez plus de chansons selon vos besoins
        ];

        foreach ($tracks as $track) {
            Track::create($track);
        }
    }
}