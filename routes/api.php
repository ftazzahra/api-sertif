<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PtkController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ThnAjarController;
use App\Http\Controllers\WalasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/jurusan', JurusanController::class);
Route::apiResource('/tahun-ajar', ThnAjarController::class);
Route::apiResource('/walas', WalasController::class);
Route::apiResource('/ptk', PtkController::class);
Route::apiResource('/rombel', RombelController::class);
Route::apiResource('/siswa', SiswaController::class);
