<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class uploadlabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uploadlabels')->insert([
            'upload_id' => 1,
            'label_id' => 1,
        ]);

        DB::table('uploadlabels')->insert([
            'upload_id' => 1,
            'label_id' => 2,
        ]);

        DB::table('uploadlabels')->insert([
            'upload_id' => 2,
            'label_id' => 3,
        ]);

        DB::table('uploadlabels')->insert([
            'upload_id' => 2,
            'label_id' => 4,
        ]);

        DB::table('uploadlabels')->insert([
            'upload_id' => 3,
            'label_id' => 5,
        ]);

        DB::table('uploadlabels')->insert([
            'upload_id' => 3,
            'label_id' => 6,
        ]);
    }
}
