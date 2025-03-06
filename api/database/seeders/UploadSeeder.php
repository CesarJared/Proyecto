<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class uploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uploads')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'img' => 'uploads/1.jpg',
            'title' => 'Pelicula 1',
            'description' => 'description-1',
            'slug' => 'pelicula-1',
        ]);

        DB::table('uploads')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'img' => 'uploads/2.jpg',
            'title' => 'Pelicula 2',
            'description' => 'description-2',
            'slug' => 'pelicula-2',
        ]);

        DB::table('uploads')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'img' => 'uploads/3.jpg',
            'title' => 'Pelicula 3',
            'description' => 'description-3',
            'slug' => 'pelicula-3',
        ]);
    }
}
