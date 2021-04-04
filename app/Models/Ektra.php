<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ektra extends Model
{
    public $timestamps = false;
    protected $table = 'ektras';
    protected $fillable = ['id'];

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
    public function getEkstra()
    {
        if (!$this->img) {
            return asset('images/noimage.jpg');
        }
        return asset('images/foto/ekstra/' . $this->img);
    }
}