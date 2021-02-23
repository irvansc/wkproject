<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = [''];

    function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    function guru()
    {
        return $this->hasMany(Guru::class);
    }
}
