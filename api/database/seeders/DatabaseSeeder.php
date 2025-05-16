<?php

namespace Database\Seeders;

use App\Models\Subs;
use App\Models\Uploads;
use App\Models\UploadsLabels;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeders::class);
        $this->call(CategorysSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(labelSeeder::class);
        $this->call(UploadSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(uploadlabelSeeder::class);
        $this->call(ListSeeder::class);
        $this->call(SubSeeder::class);
    }
}
