<?php

namespace App\Helpers;

use App\Models\Blog;
use App\Models\Project;

class Mapped
{
    public static function projectMap(Project $project)
    {
        return [
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
            'abouts' => $project->aboutProjects->map(fn($about) => [
                'image' => $about->image,
                'description' => $about->description,
            ]),
            'features' => $project->featureProjects->map(fn($feature) => [
                'name' => $feature->name,
                'image' => $feature->image,
                'description' => $feature->description,
            ]),
            'stacks' => $project->stackProjects->map(fn($stack) => [
                'name' => $stack->name,
                'image' => $stack->image,
                'description' => $stack->description,
            ]),
            'created_at' => $project->created_at->toDateTimeString(),
        ];
    }

    public static function blogMap(Blog $blog)
    {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'slug' => $blog->slug,
            'image' => $blog->image,
            'content' => $blog->content,
            'blog_category' => [
                'name' => $blog->blogCategory->name,
                'slug' => $blog->blogCategory->slug,
            ],
            'created_at' => $blog->created_at->toDateTimeString(),
        ];
    }
}
