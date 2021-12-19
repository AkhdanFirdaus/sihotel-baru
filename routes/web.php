<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'logged'])->middleware('auth')->name('home-logged');
Route::post('email', [HomeController::class, 'email'])->name('mail');

Route::prefix('reservation')->group(function () {
    Route::get('{room}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::get('{room}/pesan', [RoomController::class, 'showForm'])->name('reservation.show-form');
    Route::post('{code}/pesan', [ReservationController::class, 'store'])->name('reservation.pesan');
    Route::get('batalPesan', [ReservationController::class, 'batalPesan'])->name('reservation.cancel');
    Route::post('cari', [ReservationController::class, 'search'])->name('reservation.search');
});

Route::prefix('verification')->group(function () {
    Route::get('{code}', [ReservationController::class, 'lihatVerifikasi'])->name('verification.show-verifikasi');
    Route::post('{payment}', [PaymentController::class, 'update'])->name('verification.update');
});

Route::prefix('room')->group(function () {
    Route::post('cari', [RoomController::class, 'search'])->name('room.search');
    Route::get('{kode_kamar}', [RoomController::class, 'show'])->name('room.show');
});

Route::prefix('hotel')->group(function () {
    Route::post('/', [HotelController::class, 'search'])->name('hotel.search');
    Route::get('{hotel}', [HotelController::class, 'show'])->name('hotel.show');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.index');
    Route::get('pengguna', [HomeController::class, 'dashboardPengguna'])->name('dashboard.pengguna');
    Route::get('pemesanan', [HomeController::class, 'dashboardPemesanan'])->name('dashboard.pemesanan');
    Route::get('hotel', [HomeController::class, 'dashboardHotel'])->name('dashboard.hotel');
});
