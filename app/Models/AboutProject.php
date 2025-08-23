<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutProject extends Model
{
    protected $fillable = [
        'project_id',
        'image',
        'description'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
