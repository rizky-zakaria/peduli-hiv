<?php

use App\Http\Controllers\Api\LaporanPerjalananController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\KonsumsiObatController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PerjalananController;
use App\Models\LaporanPerjalanan;
use Illuminate\Support\Facades\Auth;
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
    return redirect('landing-page');
});

Auth::routes();
Route::get('landing-page', [LandingController::class, 'index']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('obat/cari/{nik}', [ObatController::class, 'cari'])->name('cari.pasien');
    Route::group(['middleware' => ['role:dikes'], 'prefix' => 'dikes'], function () {
        Route::resource('faskes', FaskesController::class);
        Route::post('pasien/manajemen-user', [PasienController::class, 'manajemen']);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'dikes'])->name('dikes.home');
        Route::get('data-master/art', [ArtController::class, 'index'])->name('art-dikes.index');
        Route::post('data-master/art', [ArtController::class, 'getArt'])->name('art-dikes.post');
        Route::get('data-master/laporan/pasien', [ArtController::class, 'pasien'])->name('data.pasien');
        Route::post('data-master/get-data-pasien', [ArtController::class, 'getDataPasien'])->name('data.post-pasien');
    });
    Route::group(['middleware' => ['role:faskes'], 'prefix' => 'faskes'], function () {
        Route::get('home', [HomeController::class, 'faskes'])->name('faskes.home');
        Route::get('konsultasi', [KonsultasiController::class, 'index'])->name('faskes.konsultasi');
        Route::get('konsultasi/getChatById/{id}', [KonsultasiController::class, 'getChat']);
        Route::get('konsultasi/getClusterById/{id}', [KonsultasiController::class, 'getClusterById']);
        Route::get('konsultasi/getUserById/{id}', [KonsultasiController::class, 'getUserById']);
        Route::post('konsultasi/kirim', [KonsultasiController::class, 'postChat']);
        Route::get('kesehatan/print', [KesehatanController::class, 'cetakAll'])->name('kesehatan.printAll');
        Route::get('kesehatan/print/{id}', [KesehatanController::class, 'cetakById'])->name('kesehatan.print');
        Route::resource('kesehatan', KesehatanController::class);
        Route::get('konsumsi-obat/print', [KonsumsiObatController::class, 'cetakAll'])->name('konsumsi-obat.printAll');
        Route::get('konsumsi-obat/print/{id}', [KonsumsiObatController::class, 'cetakById'])->name('konsumsi-obat.print');
        Route::resource('konsumsi-obat', KonsumsiObatController::class);
        Route::resource('obat', ObatController::class);
        Route::post('obat/ambil-obat', [ObatController::class, 'ambilObat']);
        Route::resource('pasien', PasienController::class);
        Route::get('perjalanan/print', [PerjalananController::class, 'cetakAll'])->name('perjalanan.printAll');
        Route::get('perjalanan/print/{id}', [PerjalananController::class, 'cetakById'])->name('perjalanan.print');
        Route::resource('perjalanan', PerjalananController::class);
        Route::get('data-master/art', [ArtController::class, 'index'])->name('art.index');
        Route::post('data-master/art', [ArtController::class, 'getArt'])->name('art.post');
        Route::get('create/cd4/{id}', [PasienController::class, 'cd4create'])->name('cd4.create');
        Route::post('store/cd4', [PasienController::class, 'cd4store'])->name('cd4.store');
        Route::get('obat/delete-distribusi-obat/{id}', [ObatController::class, 'deleteDistribusi']);
    });
    Route::group(['middleware' => ['role:pasien'], 'prefix' => 'pasien'], function () {
        Route::get('home', [HomeController::class, 'pasien'])->name('pasien.home');
    });
});
