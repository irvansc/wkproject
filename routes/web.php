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
    Route::resource('pengguna', 'Admin\UserController');
    Route::post('pengguna/updatepw/{id}', 'Admin\UserController@updatepw');
    Route::get('pengguna/delete/{id}', 'Admin\UserController@delete');
    Route::resource('post', 'Admin\PostController');
    Route::get('post/delete/{id}', 'Admin\PostController@delete');
    // Route::any('/post/data', 'Admin\PostController@data');
    Route::resource('kategori', 'Admin\CategoryController');
    Route::get('kategori/delete/{id}', 'Admin\CategoryController@delete');
});
