<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DatakkController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home']);

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('billing', function () {
        return view('billing');
    })->name('billing');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');
    //home

    //User
    Route::get('/user', [InfoUserController::class, 'Index'])->name('user');
    Route::get('/get', [InfoUserController::class, 'Get'])->name('getdata');
    Route::get('/tambah-user', [InfoUserController::class, 'Tambah'])->name('tambahuser');
    Route::post('/send-user', [InfoUserController::class, 'Send'])->name('Send-User');
    Route::get('/edit-user/{id}', [InfoUserController::class, 'Edit'])->name('edit-User');
    Route::post('/update-user/{id}', [InfoUserController::class, 'Update'])->name('update-User');
    Route::DELETE('/delete-user/{id}', [InfoUserController::class, 'Delete'])->name('delete-User');

    //Data Penduduk
    Route::get('/datapenduduk', [DataPendudukController::class, 'Index'])->name('datapenduduk');
    Route::get('/get', [DataPendudukController::class, 'Get'])->name('getdata');
    Route::get('/tambah-datapenduduk', [DataPendudukController::class, 'Tambah'])->name('tambah-datapenduduk');
    Route::post('/send-datapenduduk', [DataPendudukController::class, 'Send'])->name('Send-datapenduduk');
    Route::get('/edit-datapenduduk/{id}', [DataPendudukController::class, 'Edit'])->name('edit-datapenduduk');
    Route::post('/update-datapenduduk/{id}', [DataPendudukController::class, 'Update'])->name('update-datapenduduk');
    Route::DELETE('/delete-datapenduduk/{id}', [DataPendudukController::class, 'Delete'])->name('delete-datapenduduk');

    //Data KK
    Route::get('/data-kk', [DatakkController::class, 'Index'])->name('data-kk');
    Route::get('/get', [DatakkController::class, 'Get'])->name('getdata');
    Route::get('/tambah-data-kk', [DatakkController::class, 'Tambah'])->name('tambah-data-kk');
    Route::post('/send-data-kk', [DatakkController::class, 'Send'])->name('Send-data-kk');
    Route::get('/edit-data-kk/{id}', [DatakkController::class, 'Edit'])->name('edit-data-kk');
    Route::post('/update-data-kk/{id}', [DatakkController::class, 'Update'])->name('update-data-kk');
    Route::DELETE('/delete-data-kk/{id}', [DatakkController::class, 'Delete'])->name('delete-data-kk');

    //Data anggota kk
    Route::get('/addanggota-data-kk/{id}', [DatakkController::class, 'Show'])->name('addanggota-data-kk');
    Route::post('/sendanggota-data-kk', [DatakkController::class, 'Sendanggota'])->name('Sendanggota-data-kk');
    Route::DELETE('/deleteanggota-data-kk/{id}', [DatakkController::class, 'Deleteanggota'])->name('deleteanggota-data-kk');

    //berita
    Route::get('/berita', [BeritaController::class, 'Index'])->name('berita');
    Route::get('/get', [BeritaController::class, 'Get'])->name('getdata');
    Route::get('/tambah-berita', [BeritaController::class, 'Tambah'])->name('tambah-berita');
    Route::post('/send-berita', [BeritaController::class, 'send'])->name('Send-berita');
    Route::get('/edit-berita/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
    Route::post('/update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
    Route::DELETE('/delete-berita/{id}', [BeritaController::class, 'delete'])->name('delete-berita');

    //pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'Index'])->name('pengumuman');
    Route::get('/get', [PengumumanController::class, 'Get'])->name('getdata');
    Route::get('/tambah-pengumuman', [PengumumanController::class, 'Tambah'])->name('tambah-pengumuman');
    Route::post('/send-pengumuman', [PengumumanController::class, 'send'])->name('Send-pengumuman');
    Route::get('/edit-pengumuman/{id}', [PengumumanController::class, 'edit'])->name('edit-pengumuman');
    Route::post('/update-pengumuman/{id}', [PengumumanController::class, 'update'])->name('update-pengumuman');
    Route::DELETE('/delete-pengumuman/{id}', [PengumumanController::class, 'delete'])->name('delete-pengumuman');

    //gallery
    Route::get('/gallery', [GalleryController::class, 'Index'])->name('gallery');
    Route::get('/get', [GalleryController::class, 'Get'])->name('getdata');
    Route::get('/tambah-gallery', [GalleryController::class, 'Tambah'])->name('tambah-gallery');
    Route::post('/send-gallery', [GalleryController::class, 'send'])->name('Send-gallery');
    Route::get('/edit-gallery/{id}', [GalleryController::class, 'edit'])->name('edit-gallery');
    Route::post('/update-gallery/{id}', [GalleryController::class, 'update'])->name('update-gallery');
    Route::DELETE('/delete-gallery/{id}', [GalleryController::class, 'delete'])->name('delete-gallery');

    //usergroup
    Route::get('/user-group', [UserGroupController::class, 'Index'])->name('user-group');
    Route::get('/tambah-usergroup', [UserGroupController::class, 'Tambah'])->name('tambahusergroup');
    Route::post('/send-usergroup', [UserGroupController::class, 'Send'])->name('Send-UserGroup');
    Route::get('/edit-usergroup/{id}', [UserGroupController::class, 'Edit'])->name('edit-UserGroup');
    Route::post('/update-usergroup/{id}', [UserGroupController::class, 'Update'])->name('update-UserGroup');
    Route::DELETE('/delete-usergroup/{id}', [UserGroupController::class, 'Delete'])->name('delete-UserGroup');

    Route::get('tables', function () {
        return view('tables');
    })->name('tables');

    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    Route::get('static-sign-in', function () {
        return view('static-sign-in');
    })->name('sign-in');

    Route::get('static-sign-up', function () {
        return view('static-sign-up');
    })->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/user-profile', [InfoUserController::class, 'profile'])->name('user-profile');
    // Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        return view('dashboard');
    })->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/home', [HomeController::class, 'Index'])->name('home');
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
