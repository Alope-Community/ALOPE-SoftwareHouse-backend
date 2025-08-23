<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            ProjectInfoSeeder::class,
            AboutProjectSeeder::class,
            FeatureProjectSeeder::class,
            StackProjectSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
        ]);
    }
}
