<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Nuteam',
                'image' => '/img/project/project_nuteam.png',
            ],
            [
                'title' => 'Safrenz',
                'image' => '/img/project/project_safrenz.png',
            ],
            [
                'title' => 'Wedding Invitation',
                'image' => '/img/project/project_wedding_invitation.png',
            ],
            [
                'title' => 'Traveloop',
                'image' => '/img/project/project_traveloop.png',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
