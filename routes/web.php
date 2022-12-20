<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
    Route::POST('permohonan_haki/upload-sertifikat/{id}', [PermohonanHakiController::class, 'uploadSertifikat'])->name('permohonan_haki.uploadSertifikat');
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/unduhan', [HomeController::class, 'unduhan'])->name('unduhan');
Route::get('/search', [HomeController::class, 'search'])->name('search');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
