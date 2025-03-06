<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class labelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('labels')->insert([
            'name' => 'Terror',
        ]);

        DB::table('labels')->insert([
            'name' => 'Comedia',
        ]);

        DB::table('labels')->insert([
            'name' => 'Drama',
        ]);

        DB::table('labels')->insert([
            'name' => 'Acción',
        ]);

        DB::table('labels')->insert([
            'name' => 'Ciencia Ficción',
        ]);

        DB::table('labels')->insert([
            'name' => 'Romance',
        ]);

        DB::table('labels')->insert([
            'name' => 'Fantasía',
        ]);

        DB::table('labels')->insert([
            'name' => 'Animación',
        ]);

        DB::table('labels')->insert([
            'name' => 'Aventura',
        ]);

        DB::table('labels')->insert([
            'name' => 'Musical',
        ]);

        DB::table('labels')->insert([
            'name' => 'Misterio',
        ]);

        DB::table('labels')->insert([
            'name' => 'Crimen',
        ]);

        DB::table('labels')->insert([
            'name' => 'Guerra',
        ]);

        DB::table('labels')->insert([
            'name' => 'Historia',
        ]); 

        DB::table('labels')->insert([
            'name' => 'Biografía',
        ]);

        DB::table('labels')->insert([
            'name' => 'Deportes',
        ]);

        DB::table('labels')->insert([
            'name' => 'Familia',
        ]);

        DB::table('labels')->insert([
            'name' => 'Terror',
        ]);

    }
}
