<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@email.com',
            'password' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@email.com',
            'password' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@email.com',
            'password' => 'admin'
        ]);

    }
}
