<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class About extends Model
{
    public $timestamps = false;
    protected $table = 'about';
    protected $guarded = ['id'];

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
