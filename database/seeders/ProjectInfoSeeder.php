<?php

namespace Database\Seeders;

use App\Models\ProjectInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectInfos = [
            [
                'project_id' => 1,
                'client' => 'Johan',
                'platform' => 'Website',
                'timeline' => '2025',
                'url' => 'https://alope.id/',
            ],
            [
                'project_id' => 2,
                'client' => 'Dr. Aulia',
                'platform' => 'Mobile',
                'timeline' => '2025',
                'url' => 'https://medicareapp.id/',
            ],
            [
                'project_id' => 3,
                'client' => 'EduNation',
                'platform' => 'Website',
                'timeline' => '2023 - 2024',
                'url' => 'https://edutrack.id/',
            ],
            [
                'project_id' => 4,
                'client' => 'Traveloop',
                'platform' => 'Website',
                'timeline' => '2023 - 2024',
                'url' => 'https://edutrack.id/',
            ],
        ];

        foreach ($projectInfos as $projectInfo) {
            ProjectInfo::create($projectInfo);
        }
    }
}
