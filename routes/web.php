<?php
use App\Http\Controllers\KontenVidioController;
use App\Http\Controllers\KontenDokumenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilController;
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
// Route::get('/konten-vidio', function () {
//     return view('admin.kontenVidio.index');
// })->name('konten-vidio');

// Route::get('/konten-dokumen', function () {
//     return view('admin.kontenDokumen.index');
// })->name('konten-dokumen');

// Route::get('/kelas', function () {
//     return view('admin.kelas.index');
// })->name('kelas');

Route::resource('kontenVidio', KontenVidioController::class);
Route::resource('kontenDokumen', KontenDokumenController::class);
Route::resource('kelas', KelasController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('iklan', IklanController::class);
Route::resource('profil', ProfilController::class);

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return '<h1>Storage Linked</h1>';
});
