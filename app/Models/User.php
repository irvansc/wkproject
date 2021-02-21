<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPhoto()
    {
        if (!$this->image) {
            return asset('images/default.png');
        }
        return asset('images/' . $this->image);
    }
    function posts()
    {
        return $this->hasMany(Post::class);
    }


    function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    function pengumuman()
    {
        return $this->hasMany(Pengumuman::class);
    }

    function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    function permission($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->pluck('name')->contains($permission)) {
                return true;
            }
        }
    }

    function album()
    {
        return $this->hasMany(Album::class);
    }
    function foto()
    {
        return $this->hasMany(Foto::class);
    }
    function video()
    {
        return $this->hasMany(Video::class);
    }
}
