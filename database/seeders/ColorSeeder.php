<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Red'],
            ['name' => 'Blue'],
            ['name' => 'Green'],
            ['name' => 'Yellow'],
            ['name' => 'Black'],
            ['name' => 'White'],
            ['name' => 'Purple'],
            ['name' => 'Orange'],
            ['name' => 'Pink'],
            ['name' => 'Gray'],
        ];

        DB::table('colors')->insert($colors);
    }
}
