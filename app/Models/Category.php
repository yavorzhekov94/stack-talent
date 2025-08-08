<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
