<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    protected $fillable = [
        'project_id',
        'client',
        'platform',
        'timeline',
        'url',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
