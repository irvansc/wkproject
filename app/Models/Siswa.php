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
    public function getSiswa()
    {
        if (!$this->photo) {
            return asset('images/default_siswa.png');
        }
        return asset('images/foto/siswa/' . $this->photo);
    }
}