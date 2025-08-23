<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    public function projectInfo()
    {
        return $this->hasOne(ProjectInfo::class);
    }

    public function aboutProject()
    {
        return $this->hasOne(AboutProject::class);
    }

    public function featureProject()
    {
        return $this->hasOne(FeatureProject::class);
    }

    public function stackProject()
    {
        return $this->hasOne(StackProject::class);
    }
}
