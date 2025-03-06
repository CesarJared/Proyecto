<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class videoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('videos')->insert([
            'uploads_id' => 1,
            'title' => 'video-1',
            'slug' => 'video-1',
        ]);
        DB::table('videos')->insert([
            'uploads_id' => 2,
            'title' => 'video-2',
            'slug' => 'video-2',
        ]);
        DB::table('videos')->insert([
            'uploads_id' => 2,
            'title' => 'video-3',
            'slug' => 'video-3',
        ]);
    }
}
