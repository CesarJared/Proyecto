<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class listSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lists')->insert([
            'user_id' => 3,
            'uploads_id' => 1,
        ]);

        DB::table('lists')->insert([
            'user_id' => 3,
            'uploads_id' => 2,
        ]);

        DB::table('lists')->insert([
            'user_id' => 3,
            'uploads_id' => 3,
        ]);
    }   
}
