<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('data_kamar', [HomeController::class, 'data_kamar']);
Route::get('detail_kamar/{id}', [HomeController::class, 'detail_kamar']);
Route::get('pesan_kamar/{id}',[ HomeController::class, 'pesan_kamar']);
Route::get('notif', [HomeController::class, 'notif']);
Route::post('proses_pesan_kamar', [HomeController::class, 'proses_pesan_kamar'])->name('proses_pesan_kamar');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('data_admin', DataAdminController::class);
    Route::post('image-upload', [SettingController::class, 'storeImage'])->name('image.upload');
    Route::resource('kamar', KamarController::class);
    Route::resource('pemesanan', PemesananController::class);
    Route::get('pemesanan.pembayaran/{id}', [PemesananController::class, 'pembayaran']);
    Route::put('proses_pembayaran/{id}', [PemesananController::class, 'proses_pembayaran'])->name('proses_pembayaran');
});