<?php

use App\Http\Controllers\BlogspotController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('halaman');
});
Auth::routes();

Route::prefix('produks')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/create', [ProdukController::class, 'create'])->name('create');
    Route::post('/', [ProdukController::class, 'store'])->name('store');
    Route::get('/{produk}', [ProdukController::class, 'show'])->name('show');
    Route::get('/{produk}/edit', [ProdukController::class, 'edit'])->name('edit');
    Route::patch('/{produk}', [ProdukController::class, 'update'])->name('update');
    Route::delete('/{produk}', [ProdukController::class, 'destroy'])->name('destroy');
});

Route::prefix('pelanggans')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('/create', [PelangganController::class, 'create'])->name('create');
    Route::post('/', [PelangganController::class, 'store'])->name('store');
    Route::get('/{pelanggan}', [PelangganController::class, 'show'])->name('show');
    Route::get('/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('edit');
    Route::patch('/{pelanggan}', [PelangganController::class, 'update'])->name('update');
    Route::delete('/{pelanggan}', [PelangganController::class, 'destroy'])->name('destroy');
});

Route::prefix('penjuals')->group(function () {
    Route::get('/', [PenjualController::class, 'index'])->name('index');
    Route::get('/create', [PenjualController::class, 'create'])->name('create');
    Route::post('/', [PenjualController::class, 'store'])->name('store');
    Route::get('/{penjual}', [PenjualController::class, 'show'])->name('show');
    Route::get('/{penjual}/edit', [PenjualController::class, 'edit'])->name('edit');
    Route::patch('/{penjual}', [PenjualController::class, 'update'])->name('update');
    Route::delete('/{penjual}', [PenjualController::class, 'destroy'])->name('destroy');
});

Route::prefix('blogspots')->group(function () {
    Route::get('/', [BlogspotController::class, 'index'])->name('index');
    Route::get('/create', [BlogspotController::class, 'create'])->name('create');
    Route::post('/', [BlogspotController::class, 'store'])->name('store');
    Route::get('/{blogspot}', [BlogspotController::class, 'show'])->name('show');
    Route::get('/{blogspot}/edit', [BlogspotController::class, 'edit'])->name('edit');
    Route::patch('/{blogspot}', [BlogspotController::class, 'update'])->name('update');
    Route::delete('/{blogspot}', [BlogspotController::class, 'destroy'])->name('destroy');
});

Route::prefix('pemesanans')->group(function () {
    Route::get('/', [PemesananController::class, 'index'])->name('index');
    Route::get('/create', [PemesananController::class, 'create'])->name('create');
    Route::post('/', [PemesananController::class, 'store'])->name('store');
    Route::get('/{pemesanan}', [PemesananController::class, 'show'])->name('show');
    Route::get('/{pemesanan}/edit', [PemesananController::class, 'edit'])->name('edit');
    Route::patch('/{pemesanan}', [PemesananController::class, 'update'])->name('update');
    Route::delete('/{pemesanan}', [PemesananController::class, 'destroy'])->name('destroy');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


