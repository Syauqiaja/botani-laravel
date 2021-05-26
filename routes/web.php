<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::prefix('produks')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/{produk}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::patch('/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
Route::get('/tokos/register', [TokoController::class, 'register'])->name('toko.register');
Route::get('/tokos/dashboard', [TokoController::class, 'dashboard'])->name('toko.dashboard');

Route::get('/users/show/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/', [UserController::class, 'index'])->name('user.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', function () {
    return view('text',  ["user"=>Auth::user()]);
});
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');

// Blog comment reply system
Route::post('/blogs/comment', [CommentController::class, 'store'])->name('blog.comment')->middleware('auth');
Route::post('/blogs/reply', [CommentController::class, 'replystore'])->name('blog.reply')->middleware('auth');
Route::post('/blogs/create', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

