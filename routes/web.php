<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
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

    //User
    Route::get('/user', [InfoUserController::class, 'Index'])->name('user');
    Route::get('/get', [InfoUserController::class, 'Get'])->name('getdata');
    Route::get('/tambah-user', [InfoUserController::class, 'Tambah'])->name('tambahuser');
    Route::post('/send-user', [InfoUserController::class, 'Send'])->name('Send-User');
    Route::get('/edit-user/{id}', [InfoUserController::class, 'Edit'])->name('edit-User');
    Route::post('/update-user/{id}', [InfoUserController::class, 'Update'])->name('update-User');
    Route::DELETE('/delete-user/{id}', [InfoUserController::class, 'Delete'])->name('delete-User');
    //User
    Route::get('/berita', [BeritaController::class, 'Index'])->name('berita');
    Route::get('/get', [BeritaController::class, 'Get'])->name('getdata');
    Route::get('/tambah-berita', [BeritaController::class, 'Tambah'])->name('tambah-berita');
    Route::post('/send-berita', [BeritaController::class, 'send'])->name('Send-berita');
    Route::get('/edit-berita/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
    Route::post('/update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
    Route::DELETE('/delete-berita/{id}', [BeritaController::class, 'delete'])->name('delete-berita');

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
