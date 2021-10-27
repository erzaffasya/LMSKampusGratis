<?php
use App\Http\Controllers\KontenVideoController;
use App\Http\Controllers\KontenDokumenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JobChannelController;
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
    return view('admin.index');
})->name('dashboard');
Route::get('/form', function () {
    return view('form');
})->name('form');
Route::get('/tab', function () {
    return view('tab');
})->name('form');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/daftar', function () {
    return view('auth.daftar');
})->name('daftar');



Route::resource('kontenVideo', KontenVideoController::class);
Route::resource('kontenDokumen', KontenDokumenController::class);
Route::resource('kelas', KelasController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('iklan', IklanController::class);
Route::resource('profil', ProfilController::class);
Route::resource('jobChannel', JobChannelController::class);
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return '<h1>Storage Linked</h1>';
});
