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
    return view('index');
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


