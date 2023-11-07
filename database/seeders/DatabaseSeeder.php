<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $albums = [
            [
                'album_id' => '1',
                'album_name' => 'Taylor Swift'
            ],
            [
                'album_id' => '2',
                'album_name' => 'Fearless'
            ],
            [
                'album_id' => '3',
                'album_name' => 'Speak Now'
            ],
            [
                'album_id' => '4',
                'album_name' => 'Red'
            ],
            [
                'album_id' => '5',
                'album_name' => '1989'
            ],
            [
                'album_id' => '6',
                'album_name' => 'Reputation'
            ],
            [
                'album_id' => '7',
                'album_name' => 'Lover'
            ],
            [
                'album_id' => '8',
                'album_name' => 'Folklore'
            ],
            [
                'album_id' => '9',
                'album_name' => 'Evermore'
            ],
            [
                'album_id' => '10',
                'album_name' => 'Midnights'
            ],
        ];

        foreach ($albums as $album) {
            DB::table('albums')->insert($album);
        }
    }
}
