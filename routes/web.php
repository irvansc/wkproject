<?php

use Illuminate\Support\Facades\Artisan;
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
Route::get('/cache', function () {
    $exitCode = Artisan::call('config:cache');
    return redirect('/');
});
// Depan
Route::resource('blog', 'BlogController');
Route::get('kategori/{alias}', 'CategoryController@index');
Route::post('comment/{id}', 'CommentController@store')->name('comment');
Route::post('/comment/addComment/{post}', 'CommentController@addComment')->name('addComment');
Route::resource('agenda', 'AgendafrontController');
Route::resource('pengumuman', 'PengumumanController');
Route::resource('guru', 'GuruController');

Route::resource('siswa', 'SiswaController');
Route::resource('kelas', 'KelasController');

Route::resource('download', 'DownloadController');
Route::resource('galery', 'GaleryController');
Route::get('galery-kategori/{id}', 'GaleryController@kate');
Route::resource('about', 'AboutController');
Route::resource('video', 'VideoController');
Route::resource('visi', 'VisiController');
Route::resource('sejarah', 'SejarahController');
Route::resource('contact', 'ContactController');
Route::resource('testimonial', 'TestimoniController');
Route::get('reload-captcha', 'ContactController@reloadCaptcha');
Route::get('reload-captchalogin', 'Auth\LoginController@reloadCaptcha');
Route::resource('sarpras', 'SaranaController');
Route::resource('jurusan', 'JurusanController');
Route::resource('ekstrakulikuler', 'EktraController');
Route::resource('osis', 'OsisController');

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
        Route::delete('delete-multiple-post', ['as' => 'post.multiple-delete', 'uses' => 'Admin\PostController@deleteMultiple']);


        Route::resource('kategori', 'Admin\CategoryController')->middleware('can:categories');
        Route::get('kategori/delete/{id}', 'Admin\CategoryController@delete');

        Route::resource('komentar', 'Admin\CommentController');
        Route::get('komentar/delete/{id}', 'Admin\CommentController@delete');
        Route::get('komentar/balasan/delete/{id}', 'Admin\CommentController@deleteBalasan');
        Route::get('komentar/pub/{id}', 'Admin\CommentController@publikasi');
        Route::post('komentar/balas/{comment}', 'Admin\CommentController@replyComment');
        Route::get('komentar/balasan/admin', 'Admin\CommentController@balasanAdmin')->name('balas.admin');
        Route::resource('permissions', 'Admin\PermissionController')->middleware('can:permissions');
        Route::resource('roles', 'Admin\RoleController')->middleware('can:roles');
        Route::match(['get', 'post'], 'roles/{id}/add', 'Admin\RoleController@add')->name('roles.add');

        Route::resource('akelas', 'Admin\KelasController')->middleware('can:akelas');
        Route::get('kelas/delete/{id}', 'Admin\KelasController@delete');

        Route::resource('asiswa', 'Admin\SiswaController')->middleware('can:siswa');
        Route::any('/asiswa/data', 'Admin\SiswaController@data');
        Route::get('asiswa/delete/{id}', 'Admin\SiswaController@delete');
        Route::get('kelas/{id}', 'Admin\SiswaController@filter');
        Route::delete('delete-multiple-siswa', ['as' => 'siswa.multiple-delete', 'uses' => 'Admin\SiswaController@deleteMultiple']);
        //impor excel
        Route::post('siswa/import/', 'Admin\SiswaController@siswaimport')->name('siswa.import');

        Route::resource('aguru', 'Admin\GuruController')->middleware('can:guru');
        Route::any('/aguru/data', 'Admin\GuruController@data');
        Route::get('aguru/delete/{id}', 'Admin\GuruController@delete');
        Route::delete('delete-multiple-guru', ['as' => 'guru.multiple-delete', 'uses' => 'Admin\GuruController@deleteMultiple']);
        //impor excel
        Route::post('guru/import/', 'Admin\GuruController@guruimport')->name('guru.import');

        Route::resource('adownload', 'Admin\DownloadController')->middleware('can:download');
        Route::get('adownload/delete/{id}', 'Admin\DownloadController@delete');

        Route::resource('apengumuman', 'Admin\PengumumanController')->middleware('can:apengumuman');
        Route::get('apengumuman/delete/{id}', 'Admin\PengumumanController@delete');

        Route::resource('aagenda', 'Admin\AgendaController')->middleware('can:aagenda');
        Route::get('aagenda/delete/{id}', 'Admin\AgendaController@delete');

        Route::resource('testimoni', 'Admin\TestimonialController')->middleware('can:testimoni');
        Route::get('testimoni/delete/{id}', 'Admin\TestimonialController@delete');

        Route::resource('vm', 'Admin\VmController')->middleware('can:vm');
        Route::resource('asejarah', 'Admin\SejarahController')->middleware('can:asejarah');

        Route::resource('aabout', 'Admin\AboutController')->middleware('can:aabout');
        Route::get('aabout/delete/{id}', 'Admin\AboutController@delete');

        Route::resource('sambutan', 'Admin\SambutanController')->middleware('can:sambutan');
        Route::get('sambutan/delete/{id}', 'Admin\SambutanController@delete');

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

        Route::resource('ekstra', 'Admin\EkstraController')->middleware('can:ekstra');
        Route::get('ekstra/delete/{id}', 'Admin\EkstraController@delete');

        Route::resource('sarana', 'Admin\SaranaController')->middleware('can:sarana');
        Route::get('sarana/delete/{id}', 'Admin\SaranaController@delete');
        Route::delete('delete-multiple-category', ['as' => 'category.multiple-delete', 'uses' => 'Admin\SaranaController@deleteMultiple']);
        Route::resource('aosis', 'Admin\OsisController')->middleware('can:aosis');
        Route::get('osis/delete/{id}', 'Admin\OsisController@delete');


        Route::resource('ajurusan', 'Admin\JurusanController')->middleware('can:ajurusan');
        Route::get('ajurusan/delete/{id}', 'Admin\JurusanController@delete');

        Route::resource('ph', 'Admin\PhController')->middleware('can:ph');
        Route::get('ph/delete/{id}', 'Admin\PhController@delete');
        Route::resource('ppdb', 'Admin\PpdbController');
        Route::get('ppdb/status/{id}', 'Admin\PpdbController@statusAktif')->name('status.aktif');
        Route::get('ppdb/status/non-aktif/{id}', 'Admin\PpdbController@statusNon')->name('status.nonaktif');
    });
});