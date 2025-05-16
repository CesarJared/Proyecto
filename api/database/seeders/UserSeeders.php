<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'img' => 'default.jpg',
            'name' => 'user1',
            'email' => 'user1@email.com',
            'password' => Hash::make('admin1')
        ]);

        DB::table('users')->insert([
            'img' => 'default.jpg',
            'name' => 'user2',
            'email' => 'user2@email.com',
            'password' => Hash::make('admin2')
        ]);

        DB::table('users')->insert([
            'img' => 'default.jpg',
            'name' => 'user3',
            'email' => 'user3@email.com',
            'password' => Hash::make('admin3')
        ]);

    }
}
