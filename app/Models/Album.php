<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Album extends Model
{
    protected $table = 'album';
    protected $guarded = [''];

    function user()
    {
        return $this->belongsTo(User::class);
    }
    function foto()
    {
        return $this->hasMany(Foto::class);
    }
    function video()
    {
        return $this->hasMany(Video::class);
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
