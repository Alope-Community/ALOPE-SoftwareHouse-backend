<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Frontend', 'Backend', 'Technology', 'Mobile Development', 'DevOps'];

        foreach ($categories as $category) {
            BlogCategory::create(
                [
                    'name' => $category,
                    'slug' => \Illuminate\Support\Str::slug($category)
                ]
            );
        }
    }
}
