<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorys')->insert([
            'category' => 'Peliculas',
            'description' => 'category-1',
        ]);

        DB::table('categorys')->insert([
            'category' => 'Documentales',
            'description' => 'category-1',
        ]);

        DB::table('categorys')->insert([
            'category' => 'Cortometrajes',
            'description' => 'category-1',
        ]);

        DB::table('categorys')->insert([
            'category' => 'Series',
            'description' => 'category-1',
        ]);
    }
}
