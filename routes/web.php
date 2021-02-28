<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('keluar', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', 'Admin\DashboardController');

    Route::group(['middleware' => 'role'], function () {
        Route::resource('pengguna', 'Admin\UserController')->middleware('can:pengguna');
        Route::post('pengguna/updatepw/{id}', 'Admin\UserController@updatepw');
        Route::get('pengguna/delete/{id}', 'Admin\UserController@delete');
        Route::resource('profiles', 'Admin\ProfileController')->middleware('can:profiles');
        Route::resource('post', 'Admin\PostController')->middleware('can:posts');
        Route::get('post/delete/{id}', 'Admin\PostController@delete');
        Route::resource('kategori', 'Admin\CategoryController')->middleware('can:categories');
        Route::get('kategori/delete/{id}', 'Admin\CategoryController@delete');

        Route::resource('komentar', 'Admin\CommentController');
        Route::get('komentar/delete/{id}', 'Admin\CommentController@delete');
        Route::resource('permissions', 'Admin\PermissionController')->middleware('can:permissions');
        Route::resource('roles', 'Admin\RoleController')->middleware('can:roles');
        Route::match(['get', 'post'], 'roles/{id}/add', 'Admin\RoleController@add')->name('roles.add');

        Route::resource('kelas', 'Admin\KelasController')->middleware('can:kelas');
        Route::get('kelas/delete/{id}', 'Admin\KelasController@delete');

        Route::resource('asiswa', 'Admin\SiswaController')->middleware('can:siswa');
        Route::any('/asiswa/data', 'Admin\SiswaController@data');
        Route::get('asiswa/delete/{id}', 'Admin\SiswaController@delete');

        Route::resource('aguru', 'Admin\GuruController')->middleware('can:guru');
        Route::any('/aguru/data', 'Admin\GuruController@data');
        Route::get('aguru/delete/{id}', 'Admin\GuruController@delete');

        Route::resource('adownload', 'Admin\DownloadController')->middleware('can:download');
        Route::get('adownload/delete/{id}', 'Admin\DownloadController@delete');
        Route::get('adownload/file/{data}', 'Admin\DownloadController@File')->name('getfile');

        Route::resource('apengumuman', 'Admin\PengumumanController')->middleware('can:apengumuman');
        Route::get('apengumuman/delete/{id}', 'Admin\PengumumanController@delete');

        Route::resource('aagenda', 'Admin\AgendaController')->middleware('can:aagenda');
        Route::get('aagenda/delete/{id}', 'Admin\AgendaController@delete');

        Route::resource('testimoni', 'Admin\TestimonialController')->middleware('can:testimoni');
        Route::get('testimoni/delete/{id}', 'Admin\TestimonialController@delete');

        Route::resource('vm', 'Admin\VmController')->middleware('can:vm');
        Route::resource('sejarah', 'Admin\SejarahController')->middleware('can:sejarah');
        Route::resource('aabout', 'Admin\AboutController')->middleware('can:aabout');
        Route::get('aabout/delete/{id}', 'Admin\AboutController@delete');

        Route::resource('albums', 'Admin\AlbumController')->middleware('can:albums');
        Route::get('albums/delete/{id}', 'Admin\AlbumController@delete');

        Route::resource('fotos', 'Admin\FotoController')->middleware('can:fotos');
        Route::get('fotos/delete/{id}', 'Admin\FotoController@delete');

        Route::resource('avideo', 'Admin\VideoController')->middleware('can:avideo');
        Route::get('avideo/delete/{id}', 'Admin\VideoController@delete');

        Route::resource('meta', 'Admin\MetaController')->middleware('can:meta');
        Route::get('meta/delete/{id}', 'Admin\MetaController@delete');

        Route::resource('fav', 'Admin\FavController')->middleware('can:fav');

        Route::resource('sosmed', 'Admin\SosmedController')->middleware('can:sosmed');

        Route::resource('im', 'Admin\ImController')->middleware('can:im');

        Route::resource('aprofile', 'Admin\FootController')->middleware('can:aprofile');

        Route::resource('slider', 'Admin\SliderController')->middleware('can:slider');
        Route::get('slider/delete/{id}', 'Admin\SliderController@delete');

        Route::resource('inbox', 'Admin\KontakController')->middleware('can:inbox');
        Route::get('inbox/delete/{id}', 'Admin\KontakController@delete');
    });
});
