<?php

use App\Http\Controllers\ApiPasienController;
use App\Http\Controllers\CekController;
use App\Http\Controllers\DashFarmasiController;
use App\Http\Controllers\DashMedisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'create'])->name('login');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('dashboard', function () {
        return view('dashboard');
    });
});

Route::middleware('auth')->group(function(){
    Route::get('cek', CekController::class)->name('cek.role');
    Route::post('logout', [LogoutController::class, 'store'])->name('logout');

    //Admin
    Route::middleware('admin')->group(function(){
        Route::resource('pengumuman', PengumumanController::class);
        Route::resource('petugas', UserController::class);
    });

    //Medis
    Route::middleware('medis')->group(function(){
        Route::get('medis', [DashMedisController::class, 'index'])->name('dashboard.medis');

        // pasien
        Route::resource('pasien', PasienController::class);
        Route::get('pasien/filter/{filter}', [PasienController::class,'filter'])->name('pasien.filter');

        Route::get('apipasien/{nik}', [ApiPasienController::class, 'index'])->name('pasien.api');

        // pemeriksaan
        Route::resource('periksa', PeriksaController::class);
        Route::put('periksa/{periksa}/rekam', [PeriksaController::class, 'updaterekam'])->name('rekam.update');
        Route::get('periksa/{periksa}/bukti', [PeriksaController::class, 'bukti'])->name('periksa.bukti');

        // surat
        Route::resource('surat/izin', SuratController::class);
        Route::put('surat/izin/sakit/{id}', [SuratController::class, 'updatesakit'])->name('izinsakit.update');
        Route::get('surat/izin/{izin}/bukti', [SuratController::class, 'suratsakit'])->name('bukti.sakit');

        Route::get('surat/kesehatan', [SuratController::class, 'indexsehat'])->name('sehat.index');
        Route::post('surat/kesehatan', [SuratController::class, 'storesehat'])->name('sehat.store');
        Route::get('surat/kesehatan/{id}', [SuratController::class, 'showsehat'])->name('sehat.show');
        Route::put('surat/kesehatan/keterangan/{id}', [SuratController::class, 'updatesehat'])->name('sehat.update');
        Route::put('surat/kesehatan/detail/{id}', [SuratController::class, 'updatesehatd'])->name('sehatd.update');
    });

    Route::middleware('farmasi')->group(function(){
        Route::get('farmasi', [DashFarmasiController::class, 'index'])->name('dashboard.farmasi');
        Route::resource('obat/stok', StokController::class);
        Route::resource('obat/masuk', MasukController::class);
        Route::put('obat/masuk/{id}/stok', [MasukController::class, 'tambahstok'])->name('tambahstok');
    });
});





