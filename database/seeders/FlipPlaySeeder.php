<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;

class FlipPlaySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Alif Zaky Nasywa',
            'email' => 'alif@example.com',
            'password' => bcrypt('password123')
        ]);

        $medias = [
            // Anime
            ['title' => "Frieren: Beyond Journey's End", 'type' => 'Anime', 'score' => 9.3, 'year' => 2023, 'creator' => 'Madhouse', 'total_count' => 28],
            ['title' => 'Jujutsu Kaisen S2', 'type' => 'Anime', 'score' => 8.8, 'year' => 2023, 'creator' => 'MAPPA', 'total_count' => 23],
            ['title' => 'Solo Leveling', 'type' => 'Anime', 'score' => 8.5, 'year' => 2024, 'creator' => 'A-1 Pictures', 'total_count' => 12],
            // Manga
            ['title' => 'One Piece', 'type' => 'Manga', 'score' => 9.2, 'year' => 1997, 'creator' => 'Eiichiro Oda', 'total_count' => 1100],
            ['title' => 'Berserk', 'type' => 'Manga', 'score' => 9.4, 'year' => 1989, 'creator' => 'Kentaro Miura', 'total_count' => 370],
            // Drama
            ['title' => 'Queen of Tears', 'type' => 'Drama', 'score' => 8.9, 'year' => 2024, 'creator' => 'tvN', 'total_count' => 16],
            ['title' => 'Crash Landing on You', 'type' => 'Drama', 'score' => 9.0, 'year' => 2019, 'creator' => 'tvN', 'total_count' => 16],
            // Light Novel
            ['title' => 'Sword Art Online', 'type' => 'Light Novel', 'score' => 8.2, 'year' => 2009, 'creator' => 'ASCII Media Works', 'total_count' => 27],
            ['title' => 'Classroom of the Elite', 'type' => 'Light Novel', 'score' => 8.9, 'year' => 2015, 'creator' => 'MF Bunko J', 'total_count' => 24],
        ];

        foreach ($medias as $data) {
            Media::create($data);
        }

        // Simulasi koleksi favorit Alif
        $user->media()->attach([1, 4, 6, 8]);
    }
}
