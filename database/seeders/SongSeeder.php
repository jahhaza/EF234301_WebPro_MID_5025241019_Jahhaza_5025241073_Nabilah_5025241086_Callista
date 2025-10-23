<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    public function run()
    {
        $songs = [
            [
                'title' => 'Backburner',
                'album' => 'MOONCHILD',
                'duration' => '3:35',
                'file_path' => 'songs/Backburner.mp3',
                'cover_image' => 'covers/Backburner.png',
                'description' => 'Nostalgic, sunlit alt-R&B single that reached wide audiences via soundtrack placement.',
                'stream_count' => 1500000,
                'track_number' => 1,
                'genre' => 'R&B',
                'release_date' => '2020-09-10'
            ],
            [
                'title' => 'La La Lost You',
                'album' => 'Nicole',
                'duration' => '3:45',
                'file_path' => 'songs/LaLaLostYou.mp3',
                'cover_image' => 'covers/LaLaLostYou.png',
                'description' => 'An intimate ballad that foregrounds vocal vulnerability and sparse arrangement.',
                'stream_count' => 2500000,
                'track_number' => 2,
                'genre' => 'Pop',
                'release_date' => '2022-08-12'
            ],
            [
                'title' => 'High School in Jakarta',
                'album' => 'Nicole',
                'duration' => '3:25',
                'file_path' => 'songs/HighSchoolInJakarta.mp3',
                'cover_image' => 'covers/HighSchoolInJakarta.png',
                'description' => 'A narrative track evoking place, formative memory, and cross-cultural identity.',
                'stream_count' => 1800000,
                'track_number' => 3,
                'genre' => 'Pop',
                'release_date' => '2022-08-12'
            ],
            [
                'title' => 'Too Much Of A Good Thing',
                'album' => 'Buzz',
                'duration' => '3:25',
                'file_path' => 'songs/TooMuchOfAGoodThing.mp3',
                'cover_image' => 'covers/TooMuchOfAGoodThing.png',
                'description' => 'Lead single tone-setting for the Buzz era; propulsive and reflective.',
                'stream_count' => 900000,
                'track_number' => 1,
                'genre' => 'Pop',
                'release_date' => '2024-01-15'
            ],
            [
                'title' => 'Oceans & Engines',
                'album' => 'Nicole',
                'duration' => '4:15',
                'file_path' => 'songs/OceansEngines.mp3',
                'cover_image' => 'covers/OceansEngines.png',
                'description' => 'Atmospheric arrangement with reflective, emotionally resonant lyrics.',
                'stream_count' => 2200000,
                'track_number' => 4,
                'genre' => 'Ballad',
                'release_date' => '2022-08-12'
            ],
            [
                'title' => 'I Like U',
                'album' => 'Nicole',
                'duration' => '4:25',
                'file_path' => 'songs/ILikeU.mp3',
                'cover_image' => 'covers/ILikeU.png',
                'description' => 'Upbeat pop track with catchy melodies and romantic lyrics.',
                'stream_count' => 1900000,
                'track_number' => 5,
                'genre' => 'Pop',
                'release_date' => '2022-08-12'
            ],
            [
                'title' => 'The Apartment We Won\'t Share',
                'album' => 'Buzz',
                'duration' => '2:32',
                'file_path' => 'songs/TheApartmentWeWontShare.mp3',
                'cover_image' => 'covers/TheApartmentWeWontShare.png',
                'description' => 'Emotional ballad about lost love and memories.',
                'stream_count' => 800000,
                'track_number' => 2,
                'genre' => 'Ballad',
                'release_date' => '2024-01-15'
            ],
            [
                'title' => 'Before',
                'album' => 'MOONCHILD',
                'duration' => '4:54',
                'file_path' => 'songs/Before.mp3',
                'cover_image' => 'covers/Before.jpg',
                'description' => 'Reflective track about past relationships and growth.',
                'stream_count' => 1200000,
                'track_number' => 2,
                'genre' => 'R&B',
                'release_date' => '2020-09-10'
            ],
            [
                'title' => 'Tsunami',
                'album' => 'Nicole',
                'duration' => '3:52',
                'file_path' => 'songs/Tsunami.mp3',
                'cover_image' => 'covers/Tsunami.png',
                'description' => 'Powerful anthem with sweeping production and emotional vocals.',
                'stream_count' => 1600000,
                'track_number' => 6,
                'genre' => 'Pop',
                'release_date' => '2022-08-12'
            ],
            [
                'title' => 'Lose',
                'album' => 'Buzz',
                'duration' => '4:31',
                'file_path' => 'songs/Lose.mp3',
                'cover_image' => 'covers/Lose.png',
                'description' => 'Heartfelt song about vulnerability and emotional risk.',
                'stream_count' => 750000,
                'track_number' => 3,
                'genre' => 'Pop',
                'release_date' => '2024-01-15'
            ],
            [
                'title' => 'Take A Chance With Me',
                'album' => 'Buzz',
                'duration' => '5:05',
                'file_path' => 'songs/TakeAChanceWithMe.mp3',
                'cover_image' => 'covers/TakeAChanceWithMe.png',
                'description' => 'Romantic ballad with soaring vocals and intimate lyrics.',
                'stream_count' => 700000,
                'track_number' => 4,
                'genre' => 'Ballad',
                'release_date' => '2024-01-15'
            ],
            [
                'title' => 'Lowkey',
                'album' => 'MOONCHILD',
                'duration' => '2:50',
                'file_path' => 'songs/Lowkey.mp3',
                'cover_image' => 'covers/Lowkey.jpg',
                'description' => 'Chill R&B track with smooth vocals and laid-back production.',
                'stream_count' => 1300000,
                'track_number' => 3,
                'genre' => 'R&B',
                'release_date' => '2020-09-10'
            ]
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}