<?php

use App\Http\Controllers\Api\HistoriController;
use App\Http\Controllers\Api\KonsultasiController;
use App\Http\Controllers\Api\LaporanKondisiController;
use App\Http\Controllers\Api\LaporanKonsumsiController;
use App\Http\Controllers\Api\LaporanPerjalananController;
use App\Http\Controllers\Api\UserController;
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

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * route "/logout"
 * @method "POST"
 */
Route::get('get-keluhan/{id}', [LaporanKondisiController::class, 'getKeluhan']);
Route::post('chat/get-chat', [KonsultasiController::class, 'getChat']);
Route::post('chat/post-chat', [KonsultasiController::class, 'postChatText']);
Route::get('faskes-name/{id}', [KonsultasiController::class, 'getFaskesName']);
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
Route::post('laporan-kondisi/id', [LaporanKondisiController::class, 'getLapById']);
Route::post('laporan-kondisi', [LaporanKondisiController::class, 'postLapById']);
Route::post('laporan-konsumsi/id', [LaporanKonsumsiController::class, 'getLapById']);
Route::post('laporan-konsumsi', [LaporanKonsumsiController::class, 'postLapById']);
Route::post('laporan-perjalanan/id', [LaporanPerjalananController::class, 'getLapById']);
Route::post('laporan-perjalanan', [LaporanPerjalananController::class, 'postLapById']);
Route::post('histori', [HistoriController::class, 'getHistoriById']);
Route::post('get/alarm', [LaporanKonsumsiController::class, 'getAlarm']);
Route::post('get/user', [UserController::class, 'getBiodata']);
Route::post('get-notif', [HistoriController::class, 'getNotif']);
Route::post('get-nama-obat', [LaporanKonsumsiController::class, 'getNamaObat']);
Route::post('get-detail-obat', [LaporanKonsumsiController::class, 'getDetailKonsumsi']);
