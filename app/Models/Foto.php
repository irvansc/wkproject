<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Foto extends Model
{
    public $timestamps = false;

    protected $table = 'foto';
    protected $guarded = [''];

    function Album()
    {
        return $this->belongsTo(Album::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getCreatedAtAttribute()
    {
        \Carbon\Carbon::setLocale('id');
        return Carbon::parse($this->attributes['tanggal'])
            ->isoFormat('dddd, D MMM Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
            ->diffForHumans();
    }
}
