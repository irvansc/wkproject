<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comment extends Model
{
    protected $guarded = ['id'];
    // function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }
    // public function childs()
    // {
    //     return $this->hasMany(Comments::class, 'parent_id');
    // }
    public function commentable()
    {
        return $this->morphTo();
    }
    public function comment()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
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
