<?php

namespace App\Models;

use App\Mapel;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $guarded = [''];

    function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
