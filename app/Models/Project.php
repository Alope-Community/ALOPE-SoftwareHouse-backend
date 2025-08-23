<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    public function aboutProjects()
    {
        return $this->hasMany(AboutProject::class);
    }

    public function featureProjects()
    {
        return $this->hasMany(FeatureProject::class);
    }

    public function stackProjects()
    {
        return $this->hasMany(StackProject::class);
    }
}
