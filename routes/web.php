<?php

use App\Http\Controllers\CekController;
use App\Http\Controllers\DashMedisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\UserController;
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
        Route::resource('pasien', PasienController::class);
    });

});





