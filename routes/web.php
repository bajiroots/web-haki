<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPermohonanController;
use App\Http\Controllers\JenisCiptaanController;
use App\Http\Controllers\SubJenisCiptaanController;
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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('jenis_permohonan', JenisPermohonanController::class);
    Route::resource('jenis_ciptaan', JenisCiptaanController::class);
    Route::resource('sub_jenis_ciptaan', SubJenisCiptaanController::class);
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
