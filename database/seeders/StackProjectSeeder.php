<?php

namespace Database\Seeders;

use App\Models\StackProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StackProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stackProjects = [
            [
                'project_id' => 1,
                'name' => 'React',
                'image' => '/img/project/card_nuteam1.png',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            ],
            [
                'project_id' => 2,
                'name' => 'NextJS',
                'image' => '/img/project/card_nuteam2.png',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            ],
            [
                'project_id' => 3,
                'name' => 'Laravel',
                'image' => '/img/project/card_nuteam2.png',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            ],
            [
                'project_id' => 4,
                'name' => 'Laravel',
                'image' => '/img/project/card_nuteam2.png',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            ],
        ];

        foreach ($stackProjects as $stackProject) {
            StackProject::create($stackProject);
        }
    }
}
