<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subs_user')->insert([
            'user_id' => 1,
            'active' => 1,
            'end_date' => now()->addMonth(),
        ]);
        DB::table('subs_user')->insert([
            'user_id' => 2,
            'active' => 1,
            'end_date' => now()->addMonth(),
        ]);
        DB::table('subs_user')->insert([
            'user_id' => 3,
            'active' => 0,
            'end_date' => now()->addMonth(),
        ]);
    }
}
