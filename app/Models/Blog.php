<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'image',
        'content',
    ];

    public function blogCategory() {
        return $this->belongsTo(BlogCategory::class);
    }
}
