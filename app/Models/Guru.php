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
    public function getGuru()
    {
        if (!$this->photo) {
            return asset('images/default.png');
        }
        return asset('images/foto/guru/' . $this->photo);
    }
}