<?php

use Illuminate\Http\Request;
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

Route::get('sub-jenis-ciptaan/{jenis_permohonan_id}/{jenis_ciptaan_id}', [App\Http\Controllers\PermohonanHakiController::class, 'getSubJenisCiptaan']);
Route::get('kota/{provinsi_id}', [App\Http\Controllers\PermohonanHakiController::class, 'getKota']);
Route::get('email/{email}', [App\Http\Controllers\Auth\RegisterController::class, 'checkEmail']);
Route::get('username/{username}', [App\Http\Controllers\Auth\RegisterController::class, 'checkUsername']);



