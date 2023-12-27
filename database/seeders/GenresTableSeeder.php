<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $genres = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Role-Playing'],
            ['name' => 'Shooter'],
            ['name' => 'Sport Games'],
            ['name' => 'Fighting'],
            ['name' => 'Racing'],
            ['name' => 'Strategy'],
            ['name' => 'Casual'],
            ['name' => 'Other'],
        ];
        
        DB::table('genres')->insert($genres);
    }
}
