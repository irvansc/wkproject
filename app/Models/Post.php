<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $guarded = ['id'];
    function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function comments()
    // {
    //     return $this->morphMany(Comments::class, 'commentable');
    // }
    public function getCreatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])
            ->isoFormat('dddd, D MMM Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
            ->diffForHumans();
    }
}
