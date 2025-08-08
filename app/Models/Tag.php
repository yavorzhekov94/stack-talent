<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function jobPosts() {
        return $this->belongsToMany(JobPost::class);
    }
}

