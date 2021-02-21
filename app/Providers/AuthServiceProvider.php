<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Post' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Actions
        Gate::define('update-posts', function ($user) {
            return $user->permission('update-posts');
        });
        Gate::define('edit-posts', function ($user) {
            return $user->permission('edit-posts');
        });

        Gate::define('delete-posts', function ($user) {
            return $user->permission('delete-posts');
        });

        Gate::define('update-users', function ($user) {
            return $user->permission('update-users');
        });

        Gate::define('delete-users', function ($user) {
            return $user->permission('delete-users');
        });

        Gate::define('update-comments', function ($user) {
            return $user->permission('update-comments');
        });

        Gate::define('delete-comments', function ($user) {
            return $user->permission('delete-comments');
        });

        // Views
        Gate::define('users', function ($user) {
            return $user->permission('users');
        });

        Gate::define('categories', function ($user) {
            return $user->permission('categories');
        });

        Gate::define('cache', function ($user) {
            return $user->permission('cache');
        });

        Gate::define('roles', function ($user) {
            return $user->permission('roles');
        });

        Gate::define('permissions', function ($user) {
            return $user->permission('permissions');
        });

        //pengguna
        Gate::define('pengguna', function ($user) {
            return $user->permission('pengguna');
        });
        Gate::define('pengguna-edit', function ($user) {
            return $user->permission('pengguna-edit');
        });
        Gate::define('pengguna-delete', function ($user) {
            return $user->permission('pengguna-delete');
        });
        Gate::define('pengguna-update', function ($user) {
            return $user->permission('pengguna-update');
        });
        Gate::define('pengguna-pw', function ($user) {
            return $user->permission('pengguna-pw');
        });
        Gate::define('pengguna-create', function ($user) {
            return $user->permission('pengguna-create');
        });
        //agenda
        Gate::define('agenda', function ($user) {
            return $user->permission('agenda');
        });
        Gate::define('agenda-edit', function ($user) {
            return $user->permission('agenda-edit');
        });
        Gate::define('agenda-delete', function ($user) {
            return $user->permission('agenda-delete');
        });
        Gate::define('agenda-update', function ($user) {
            return $user->permission('agenda-update');
        });
        Gate::define('agenda-create', function ($user) {
            return $user->permission('agenda-create');
        });
        //pengumuman
        Gate::define('pengumuman', function ($user) {
            return $user->permission('pengumuman');
        });
        Gate::define('pengumuman-edit', function ($user) {
            return $user->permission('pengumuman-edit');
        });
        Gate::define('pengumuman-delete', function ($user) {
            return $user->permission('pengumuman-delete');
        });
        Gate::define('pengumuman-update', function ($user) {
            return $user->permission('pengumuman-update');
        });
        Gate::define('pengumuman-create', function ($user) {
            return $user->permission('pengumuman-create');
        });
        //download
        Gate::define('download', function ($user) {
            return $user->permission('download');
        });
        Gate::define('download-edit', function ($user) {
            return $user->permission('download-edit');
        });
        Gate::define('download-delete', function ($user) {
            return $user->permission('download-delete');
        });
        Gate::define('download-update', function ($user) {
            return $user->permission('download-update');
        });
        Gate::define('download-create', function ($user) {
            return $user->permission('download-create');
        });
        //albums
        Gate::define('albums', function ($user) {
            return $user->permission('albums');
        });
        Gate::define('albums-edit', function ($user) {
            return $user->permission('albums-edit');
        });
        Gate::define('albums-delete', function ($user) {
            return $user->permission('albums-delete');
        });
        Gate::define('albums-update', function ($user) {
            return $user->permission('albums-update');
        });
        Gate::define('albums-create', function ($user) {
            return $user->permission('albums-create');
        });
        //fotos
        Gate::define('fotos', function ($user) {
            return $user->permission('fotos');
        });
        Gate::define('fotos-edit', function ($user) {
            return $user->permission('fotos-edit');
        });
        Gate::define('fotos-delete', function ($user) {
            return $user->permission('fotos-delete');
        });
        Gate::define('fotos-update', function ($user) {
            return $user->permission('fotos-update');
        });
        Gate::define('fotos-create', function ($user) {
            return $user->permission('fotos-create');
        });
        //kelas
        Gate::define('kelas', function ($user) {
            return $user->permission('kelas');
        });
        Gate::define('kelas-edit', function ($user) {
            return $user->permission('kelas-edit');
        });
        Gate::define('kelas-delete', function ($user) {
            return $user->permission('kelas-delete');
        });
        Gate::define('kelas-update', function ($user) {
            return $user->permission('kelas-update');
        });
        Gate::define('kelas-create', function ($user) {
            return $user->permission('kelas-create');
        });
        //siswa
        Gate::define('siswa', function ($user) {
            return $user->permission('siswa');
        });
        Gate::define('siswa-edit', function ($user) {
            return $user->permission('siswa-edit');
        });
        Gate::define('siswa-delete', function ($user) {
            return $user->permission('siswa-delete');
        });
        Gate::define('siswa-update', function ($user) {
            return $user->permission('siswa-update');
        });
        Gate::define('siswa-create', function ($user) {
            return $user->permission('siswa-create');
        });
        //guru
        Gate::define('guru', function ($user) {
            return $user->permission('guru');
        });
        Gate::define('guru-edit', function ($user) {
            return $user->permission('guru-edit');
        });
        Gate::define('guru-delete', function ($user) {
            return $user->permission('guru-delete');
        });
        Gate::define('guru-update', function ($user) {
            return $user->permission('guru-update');
        });
        Gate::define('guru-create', function ($user) {
            return $user->permission('guru-create');
        });
        //video
        Gate::define('video', function ($user) {
            return $user->permission('video');
        });
        Gate::define('video-edit', function ($user) {
            return $user->permission('video-edit');
        });
        Gate::define('video-delete', function ($user) {
            return $user->permission('video-delete');
        });
        Gate::define('video-update', function ($user) {
            return $user->permission('video-update');
        });
        Gate::define('video-create', function ($user) {
            return $user->permission('video-create');
        });
    }
}
