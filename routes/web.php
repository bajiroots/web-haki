<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisPermohonanController;
use App\Http\Controllers\JenisCiptaanController;
use App\Http\Controllers\SubJenisCiptaanController;
use App\Http\Controllers\PermohonanHakiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanPermohonanController;
use App\Http\Controllers\LaporanJenisPermohonanController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');
    Route::resource('jenis_permohonan', JenisPermohonanController::class);
    Route::resource('user', UserController::class);
    Route::resource('jenis_ciptaan', JenisCiptaanController::class);
    Route::resource('sub_jenis_ciptaan', SubJenisCiptaanController::class);
    Route::resource('permohonan_haki', PermohonanHakiController::class);
    Route::put('permohonan_haki_tolak/{id}', [App\Http\Controllers\PermohonanHakiController::class, 'tolakPermohonan'])->name('tolakPermohonan');
    Route::POST('permohonan_haki/upload-sertifikat/{id}', [PermohonanHakiController::class, 'uploadSertifikat'])->name('permohonan_haki.uploadSertifikat');
    Route::get('/profil/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::PUT('/profil/{id}', [ProfilController::class, 'update'])->name('profile.update');
    Route::resource('laporan_permohonan', LaporanPermohonanController::class);
    Route::resource('laporan_jenis_permohonan', LaporanJenisPermohonanController::class);
    Route::get('/downloadpdf', [LaporanPermohonanController::class, 'downloadpdf']);
    Route::get('/downloadpdf_laporan_jenis_permohonan', [LaporanJenisPermohonanController::class, 'downloadpdf']);



    
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/unduhan', [HomeController::class, 'unduhan'])->name('unduhan');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/penelusuran', [App\Http\Controllers\PenelusuranController::class, 'index'])->name('penelusuran');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

