<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPermohonanController;
use App\Http\Controllers\JenisCiptaanController;
use App\Http\Controllers\SubJenisCiptaanController;
use App\Http\Controllers\PermohonanHakiController;
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');
    Route::resource('jenis_permohonan', JenisPermohonanController::class);
    Route::resource('jenis_ciptaan', JenisCiptaanController::class);
    Route::resource('sub_jenis_ciptaan', SubJenisCiptaanController::class);
    Route::resource('permohonan_haki', PermohonanHakiController::class);
    Route::put('permohonan_haki_tolak/{id}', [App\Http\Controllers\PermohonanHakiController::class, 'tolakPermohonan'])->name('tolakPermohonan');
    Route::POST('permohonan_haki/upload-sertifikat/{id}', [PermohonanHakiController::class, 'uploadSertifikat'])->name('permohonan_haki.uploadSertifikat');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/unduhan', function () {
    return view('unduhan');
})->name('unduhan');

Route::get('/penelusuran', [App\Http\Controllers\PenelusuranController::class, 'index'])->name('penelusuran');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
