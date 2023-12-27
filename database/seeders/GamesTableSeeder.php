<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $games = [
            ['name' => 'The Legend of Zelda', 'release_year' => 1986, 'producer_id' => 1, 'genre_id' => 1],
            ['name' => 'Sonic the Hedgehog', 'release_year' => 1991, 'producer_id' => 2, 'genre_id' => 2],
            ['name' => 'The Last of Us', 'release_year' => 2013, 'producer_id' => 3, 'genre_id' => 1],
            ['name' => 'Halo series', 'release_year' => 2001, 'producer_id' => 4, 'genre_id' => 4],
            ['name' => 'Need for Speed', 'release_year' => 1994, 'producer_id' => 5, 'genre_id' => 7],
            ['name' => 'Rainbow Six Siege', 'release_year' => 2015, 'producer_id' => 6, 'genre_id' => 4],
            ['name' => 'Overwatch', 'release_year' => 2016, 'producer_id' => 7, 'genre_id' => 4],
            ['name' => 'Grand Theft Auto V', 'release_year' => 2013, 'producer_id' => 8, 'genre_id' => 1],
            ['name' => 'Final Fantasy', 'release_year' => 1987, 'producer_id' => 9, 'genre_id' => 3],
            ['name' => 'Resident Evil', 'release_year' => 1996, 'producer_id' => 10, 'genre_id' => 1],
            ['name' => 'Metal Gear Solid', 'release_year' => 1998, 'producer_id' => 11, 'genre_id' => 2],
            ['name' => 'Tekken', 'release_year' => 1994, 'producer_id' => 12, 'genre_id' => 6],
            ['name' => 'Artifact', 'release_year' => 2018, 'producer_id' => 13, 'genre_id' => 8],
            ['name' => 'Fortnite', 'release_year' => 2017, 'producer_id' => 14, 'genre_id' => 4],
            ['name' => 'The Witcher 3: Wild Hunt', 'release_year' => 2015, 'producer_id' => 15, 'genre_id' => 1],
            ['name' => 'Fallout', 'release_year' => 1997, 'producer_id' => 16, 'genre_id' => 3],
            ['name' => 'PUBG Mobile', 'release_year' => 2018, 'producer_id' => 17, 'genre_id' => 10],
            ['name' => 'Spider-Man (Marvel)', 'release_year' => 2018, 'producer_id' => 18, 'genre_id' => 1],
            ['name' => 'Uncharted', 'release_year' => 2007, 'producer_id' => 19, 'genre_id' => 2],
            ['name' => 'Red Dead Redemption 2', 'release_year' => 2018, 'producer_id' => 20, 'genre_id' => 10],
        ];

        DB::table('games')->insert($games);

        
    }
}
