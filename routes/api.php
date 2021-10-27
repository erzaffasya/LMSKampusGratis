<?php

use App\Models\Kelas;

use App\Http\Controllers\API\KelasController;
use App\Http\Controllers\API\KontenDokumenController;
use App\Http\Controllers\API\KontenVideoController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\DownloadController;
use App\Http\Controllers\API\ViewController;
use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\IklanController;
use App\Http\Controllers\API\JobChannelController;
use App\Http\Controllers\API\ProfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/login', [PassportAuthController::class, 'login']);
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/{id}', [KelasController::class, 'show']);
Route::get('/kelas/search/{name}', [KelasController::class, 'search']);
Route::get('/kelas/{id}/video', [KelasController::class, 'kelas_video']);
Route::get('/kelas/{id}/dokumen', [KelasController::class, 'kelas_dokumen']);
Route::post('/kelas/{id}/video', [KontenVideoController::class, 'store']);
Route::post('/kelas/{id}/dokumen', [KontenDokumenController::class, 'store']);
Route::get('/kelas/search/{name}', [KelasController::class, 'search']);

Route::get('/dokumen', [KontenDokumenController::class, 'index']);
Route::get('/dokumen/{id}', [KontenDokumenController::class, 'show']);
Route::get('/dokumen/search/{name}', [KontenDokumenController::class, 'search']);
Route::get('/kelas/{id}/dokumen/jumlah', [KontenDokumenController::class, 'jumlah_dokumen']);

Route::get('/video', [KontenVideoController::class, 'index']);
Route::get('/video/{id}', [KontenVideoController::class, 'show']);
Route::get('/vido/search/{name}', [KontenVideoController::class, 'search']);
Route::get('/kelas/{id}/video/jumlah', [KontenVideoController::class, 'jumlah_video']);

//Route Artikel
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/show/{id}', [ArtikelController::class, 'show']);
Route::get('/artikel/search/{judul}', [ArtikelController::class, 'search']);
Route::post('/artikel/store', [ArtikelController::class, 'store']);
Route::put('artikel/update/{id}', [ArtikelController::class, 'update']);
Route::delete('artikel/delete/{id}', [ArtikelController::class, 'destroy']);

//Route Iklan
Route::get('/iklan', [IklanController::class, 'index']);
Route::post('/iklan', [IklanController::class, 'store']);
Route::get('/iklan/{id}', [IklanController::class, 'show']);
Route::get('/iklan/{id}/download', [IklanController::class, 'download']);
Route::get('/iklan/{id}/view', [IklanController::class, 'view']);
Route::resource('iklan', IklanController::class);

//Route JobChannel
Route::get('/jobChannel', [JobChannelController::class, 'index']);
Route::post('/jobChannel', [JobChannelController::class, 'store']);
Route::get('/jobChannel/{id}', [JobChannelController::class, 'show']);
Route::get('/jobChannel/{id}/download', [JobChannelController::class, 'download']);
Route::get('/jobChannel/{id}/view', [JobChannelController::class, 'view']);

//Route Profil
Route::get('/profil', [ProfilController::class, 'index']);
Route::post('/profil', [ProfilController::class, 'store']);
Route::get('/profil/{id}', [ProfilController::class, 'show']);
Route::get('/profil/{id}/view', [PofilController::class, 'view']);

// Download Route
Route::get('download/{filename}', [DownloadController::class, 'index']);
Route::get('/dokumen/{id}/download', [KontenDokumenController::class, 'download']);
Route::get('/dokumen/{id}/view', [KontenDokumenController::class, 'view']);
Route::get('view/{filename}', [ViewController::class, 'index']);
Route::get('view2/{filename}', [ViewController::class, 'index2']);

// Protected routes
Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::put('/kelas/{id}', [KelasController::class, 'update']);
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::put('/dokumen/{id}', [KontenDokumenController::class, 'update']);
    Route::delete('/dokumen/{id}', [KontenDokumenController::class, 'destroy']);

    Route::put('/video/{id}', [KontenVideoController::class, 'update']);
    Route::delete('/video/{id}', [KontenVideoController::class, 'destroy']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
