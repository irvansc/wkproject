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
        Route::resource('pengguna', 'Admin\UserController');
        Route::post('pengguna/updatepw/{id}', 'Admin\UserController@updatepw');
        Route::get('pengguna/delete/{id}', 'Admin\UserController@delete');
        Route::resource('post', 'Admin\PostController');
        Route::get('post/delete/{id}', 'Admin\PostController@delete');
        Route::resource('kategori', 'Admin\CategoryController');
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

        Route::resource('apengumuman', 'Admin\PengumumanController');
        Route::get('apengumuman/delete/{id}', 'Admin\PengumumanController@delete');

        Route::resource('aagenda', 'Admin\AgendaController');
        Route::get('aagenda/delete/{id}', 'Admin\AgendaController@delete');
    });
});
