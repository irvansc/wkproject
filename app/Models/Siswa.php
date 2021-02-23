<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = [''];

    function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
