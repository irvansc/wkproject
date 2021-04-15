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
        Gate::define('posts', function ($user) {
            return $user->permission('posts');
        });
        Gate::define('posts-create', function ($user) {
            return $user->permission('posts-create');
        });
        Gate::define('posts-update', function ($user) {
            return $user->permission('posts-update');
        });
        Gate::define('posts-edit', function ($user) {
            return $user->permission('posts-edit');
        });

        Gate::define('posts-delete', function ($user) {
            return $user->permission('posts-delete');
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
        Gate::define('apengumuman', function ($user) {
            return $user->permission('apengumuman');
        });
        Gate::define('apengumuman-edit', function ($user) {
            return $user->permission('apengumuman-edit');
        });
        Gate::define('apengumuman-delete', function ($user) {
            return $user->permission('apengumuman-delete');
        });
        Gate::define('apengumuman-update', function ($user) {
            return $user->permission('apengumuman-update');
        });
        Gate::define('apengumuman-create', function ($user) {
            return $user->permission('apengumuman-create');
        });
        //agenda
        Gate::define('aagenda', function ($user) {
            return $user->permission('aagenda');
        });
        Gate::define('aagenda-edit', function ($user) {
            return $user->permission('aagenda-edit');
        });
        Gate::define('aagenda-delete', function ($user) {
            return $user->permission('aagenda-delete');
        });
        Gate::define('aagenda-update', function ($user) {
            return $user->permission('aagenda-update');
        });
        Gate::define('aagenda-create', function ($user) {
            return $user->permission('aagenda-create');
        });
        //testimoni
        Gate::define('testimoni', function ($user) {
            return $user->permission('testimoni');
        });
        Gate::define('testimoni-edit', function ($user) {
            return $user->permission('testimoni-edit');
        });
        Gate::define('testimoni-delete', function ($user) {
            return $user->permission('testimoni-delete');
        });
        Gate::define('testimoni-update', function ($user) {
            return $user->permission('testimoni-update');
        });
        Gate::define('testimoni-create', function ($user) {
            return $user->permission('testimoni-create');
        });
        //vm
        Gate::define('vm', function ($user) {
            return $user->permission('vm');
        });
        Gate::define('vm-edit', function ($user) {
            return $user->permission('vm-edit');
        });
        Gate::define('vm-delete', function ($user) {
            return $user->permission('vm-delete');
        });
        Gate::define('vm-update', function ($user) {
            return $user->permission('vm-update');
        });
        Gate::define('vm-create', function ($user) {
            return $user->permission('vm-create');
        });
        //asejarah
        Gate::define('asejarah', function ($user) {
            return $user->permission('asejarah');
        });
        Gate::define('asejarah-edit', function ($user) {
            return $user->permission('asejarah-edit');
        });
        Gate::define('asejarah-delete', function ($user) {
            return $user->permission('asejarah-delete');
        });
        Gate::define('asejarah-update', function ($user) {
            return $user->permission('asejarah-update');
        });
        Gate::define('asejarah-create', function ($user) {
            return $user->permission('asejarah-create');
        });
        //aabout
        Gate::define('aabout', function ($user) {
            return $user->permission('aabout');
        });
        Gate::define('aabout-edit', function ($user) {
            return $user->permission('aabout-edit');
        });
        Gate::define('aabout-delete', function ($user) {
            return $user->permission('aabout-delete');
        });
        Gate::define('aabout-update', function ($user) {
            return $user->permission('aabout-update');
        });
        Gate::define('aabout-create', function ($user) {
            return $user->permission('aabout-create');
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
        //avideo
        Gate::define('avideo', function ($user) {
            return $user->permission('avideo');
        });
        Gate::define('avideo-edit', function ($user) {
            return $user->permission('avideo-edit');
        });
        Gate::define('avideo-delete', function ($user) {
            return $user->permission('avideo-delete');
        });
        Gate::define('avideo-update', function ($user) {
            return $user->permission('avideo-update');
        });
        Gate::define('avideo-create', function ($user) {
            return $user->permission('avideo-create');
        });
        //meta
        Gate::define('meta', function ($user) {
            return $user->permission('meta');
        });
        Gate::define('meta-edit', function ($user) {
            return $user->permission('meta-edit');
        });
        Gate::define('meta-delete', function ($user) {
            return $user->permission('meta-delete');
        });
        Gate::define('meta-update', function ($user) {
            return $user->permission('meta-update');
        });
        Gate::define('meta-create', function ($user) {
            return $user->permission('meta-create');
        });
        //fav
        Gate::define('fav', function ($user) {
            return $user->permission('fav');
        });
        Gate::define('fav-edit', function ($user) {
            return $user->permission('fav-edit');
        });
        Gate::define('fav-delete', function ($user) {
            return $user->permission('fav-delete');
        });
        Gate::define('fav-update', function ($user) {
            return $user->permission('fav-update');
        });
        Gate::define('fav-create', function ($user) {
            return $user->permission('fav-create');
        });
        //sosmed
        Gate::define('sosmed', function ($user) {
            return $user->permission('sosmed');
        });
        Gate::define('sosmed-edit', function ($user) {
            return $user->permission('sosmed-edit');
        });
        Gate::define('sosmed-delete', function ($user) {
            return $user->permission('sosmed-delete');
        });
        Gate::define('sosmed-update', function ($user) {
            return $user->permission('sosmed-update');
        });
        Gate::define('sosmed-create', function ($user) {
            return $user->permission('sosmed-create');
        });
        //im
        Gate::define('im', function ($user) {
            return $user->permission('im');
        });
        Gate::define('im-edit', function ($user) {
            return $user->permission('im-edit');
        });
        Gate::define('im-delete', function ($user) {
            return $user->permission('im-delete');
        });
        Gate::define('im-update', function ($user) {
            return $user->permission('im-update');
        });
        Gate::define('im-create', function ($user) {
            return $user->permission('im-create');
        });
        //im
        Gate::define('aprofile', function ($user) {
            return $user->permission('aprofile');
        });
        Gate::define('aprofile-edit', function ($user) {
            return $user->permission('aprofile-edit');
        });
        Gate::define('aprofile-delete', function ($user) {
            return $user->permission('aprofile-delete');
        });
        Gate::define('aprofile-update', function ($user) {
            return $user->permission('aprofile-update');
        });
        Gate::define('aprofile-create', function ($user) {
            return $user->permission('aprofile-create');
        });
        //slider
        Gate::define('slider', function ($user) {
            return $user->permission('slider');
        });
        Gate::define('slider-edit', function ($user) {
            return $user->permission('slider-edit');
        });
        Gate::define('slider-delete', function ($user) {
            return $user->permission('slider-delete');
        });
        Gate::define('slider-update', function ($user) {
            return $user->permission('slider-update');
        });
        Gate::define('slider-create', function ($user) {
            return $user->permission('slider-create');
        });
        //inbox
        Gate::define('inbox', function ($user) {
            return $user->permission('inbox');
        });
        Gate::define('inbox-edit', function ($user) {
            return $user->permission('inbox-edit');
        });
        Gate::define('inbox-delete', function ($user) {
            return $user->permission('inbox-delete');
        });
        Gate::define('inbox-update', function ($user) {
            return $user->permission('inbox-update');
        });
        Gate::define('inbox-create', function ($user) {
            return $user->permission('inbox-create');
        });
        //akelas
        Gate::define('akelas', function ($user) {
            return $user->permission('akelas');
        });
        Gate::define('akelas-edit', function ($user) {
            return $user->permission('akelas-edit');
        });
        Gate::define('akelas-delete', function ($user) {
            return $user->permission('akelas-delete');
        });
        Gate::define('akelas-update', function ($user) {
            return $user->permission('akelas-update');
        });
        Gate::define('akelas-create', function ($user) {
            return $user->permission('akelas-create');
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
        //profiles
        Gate::define('profiles', function ($user) {
            return $user->permission('profiles');
        });
        Gate::define('profiles-edit', function ($user) {
            return $user->permission('profiles-edit');
        });
        Gate::define('profiles-update', function ($user) {
            return $user->permission('profiles-update');
        });
        Gate::define('profiles-create', function ($user) {
            return $user->permission('profiles-create');
        });
        //ekstra
        Gate::define('ekstra', function ($user) {
            return $user->permission('ekstra');
        });
        Gate::define('ekstra-edit', function ($user) {
            return $user->permission('ekstra-edit');
        });
        Gate::define('ekstra-update', function ($user) {
            return $user->permission('ekstra-update');
        });
        Gate::define('ekstra-create', function ($user) {
            return $user->permission('ekstra-create');
        });
        Gate::define('ekstra-delete', function ($user) {
            return $user->permission('ekstra-delete');
        });
        //sambutan
        Gate::define('sambutan', function ($user) {
            return $user->permission('sambutan');
        });
        Gate::define('sambutan-edit', function ($user) {
            return $user->permission('sambutan-edit');
        });
        Gate::define('sambutan-update', function ($user) {
            return $user->permission('sambutan-update');
        });
        Gate::define('sambutan-create', function ($user) {
            return $user->permission('sambutan-create');
        });
        Gate::define('sambutan-delete', function ($user) {
            return $user->permission('sambutan-delete');
        });
        //sarana
        Gate::define('sarana', function ($user) {
            return $user->permission('sarana');
        });
        Gate::define('sarana-edit', function ($user) {
            return $user->permission('sarana-edit');
        });
        Gate::define('sarana-update', function ($user) {
            return $user->permission('sarana-update');
        });
        Gate::define('sarana-create', function ($user) {
            return $user->permission('sarana-create');
        });
        Gate::define('sarana-delete', function ($user) {
            return $user->permission('sarana-delete');
        });
        //aosis
        Gate::define('aosis', function ($user) {
            return $user->permission('aosis');
        });
        Gate::define('aosis-edit', function ($user) {
            return $user->permission('aosis-edit');
        });
        Gate::define('aosis-update', function ($user) {
            return $user->permission('aosis-update');
        });
        Gate::define('aosis-create', function ($user) {
            return $user->permission('aosis-create');
        });
        Gate::define('aosis-delete', function ($user) {
            return $user->permission('aosis-delete');
        });
        //ajurusan
        Gate::define('ajurusan', function ($user) {
            return $user->permission('ajurusan');
        });
        Gate::define('ajurusan-edit', function ($user) {
            return $user->permission('ajurusan-edit');
        });
        Gate::define('ajurusan-update', function ($user) {
            return $user->permission('ajurusan-update');
        });
        Gate::define('ajurusan-create', function ($user) {
            return $user->permission('ajurusan-create');
        });
        Gate::define('ajurusan-delete', function ($user) {
            return $user->permission('ajurusan-delete');
        });
        //ph
        Gate::define('ph', function ($user) {
            return $user->permission('ph');
        });
        Gate::define('ph-edit', function ($user) {
            return $user->permission('ph-edit');
        });
        Gate::define('ph-update', function ($user) {
            return $user->permission('ph-update');
        });
        Gate::define('ph-create', function ($user) {
            return $user->permission('ph-create');
        });
        Gate::define('ph-delete', function ($user) {
            return $user->permission('ph-delete');
        });
        //ppdb
        Gate::define('ppdb', function ($user) {
            return $user->permission('ppdb');
        });
        Gate::define('ppdb-edit', function ($user) {
            return $user->permission('ppdb-edit');
        });
        Gate::define('ppdb-update', function ($user) {
            return $user->permission('ppdb-update');
        });
        Gate::define('ppdb-create', function ($user) {
            return $user->permission('ppdb-create');
        });
        Gate::define('ppdb-delete', function ($user) {
            return $user->permission('ppdb-delete');
        });
    }
}