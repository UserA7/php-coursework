<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProducersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $producers = [
            ['name' => 'Nintendo', 'year_of_creation' => 1889],
            ['name' => 'Sega', 'year_of_creation' => 1960],
            ['name' => 'Sony Interactive Entertainment', 'year_of_creation' => 1993],
            ['name' => 'Microsoft Game Studios/Xbox Game Studios', 'year_of_creation' => 2000],
            ['name' => 'Electronic Arts (EA)', 'year_of_creation' => 1982],
            ['name' => 'Ubisoft', 'year_of_creation' => 1986],
            ['name' => 'Activision Blizzard', 'year_of_creation' => 2008],
            ['name' => 'Take-Two Interactive', 'year_of_creation' => 1993],
            ['name' => 'Square Enix', 'year_of_creation' => 2003],
            ['name' => 'Capcom', 'year_of_creation' => 1979],
            ['name' => 'Konami', 'year_of_creation' => 1969],
            ['name' => 'Bandai Namco Entertainment', 'year_of_creation' => 2006],
            ['name' => 'Valve Corporation', 'year_of_creation' => 1996],
            ['name' => 'Epic Games', 'year_of_creation' => 1991],
            ['name' => 'CD Projekt', 'year_of_creation' => 1994],
            ['name' => 'Bethesda Softworks', 'year_of_creation' => 1986],
            ['name' => 'Tencent Games', 'year_of_creation' => 2003],
            ['name' => 'Insomniac Games', 'year_of_creation' => 1994],
            ['name' => 'Naughty Dog', 'year_of_creation' => 1984],
            ['name' => 'Rockstar Games', 'year_of_creation' => 1998],
        ];
        
        DB::table('producers')->insert($producers);
    }
}
