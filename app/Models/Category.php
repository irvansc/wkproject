<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
