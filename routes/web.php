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

Route::get('/users/penjual', [UserController::class, 'penjual']);
Route::get('/users/admin', [UserController::class, 'admin']);
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/users/', [UserController::class, 'index'])->name('user.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', function () {
    return view('text',  ["user"=>Auth::user()]);
});
Route::post('/pemesanans/', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanans/{pemesanan}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::patch('/pemesanans/{pemesanan}', [PemesananController::class, 'update'])->name('pemesanan.update');

Route::get('/tokos/create', [TokoController::class, 'create'])->name('toko.create');
Route::post('/tokos', [TokoController::class, 'store'])->name('toko.store');

//Buat Test biar bisa edit nanti disesuaikan aja gpp :v
Route::get('/createproduct',[HomeController::class,'createProduct']); //create produk toko
Route::get('/editproduct',[HomeController::class,'editProduct']); //edit produk toko
Route::get('/createpesanan',[HomeController::class,'createPesanan']); //create pesanan

// Route::get('/email/verify', function () {
    //     return view('auth.verify');
    // })->middleware('auth')->name('verification.notice');


    // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        //     $request->fulfill();

        //     return redirect('/');
        // })->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
// Blog comment reply system
Route::post('/blogs/comment', [CommentController::class, 'store'])->name('blog.comment')->middleware('auth');
Route::post('/blogs/reply', [CommentController::class, 'replystore'])->name('blog.reply')->middleware('auth');
Route::post('/blogs/create', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::patch('/blogs/{blog}', [BlogController::class, 'update'])->name('blog.update')->middleware('auth');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('auth');

// ---- Penting v v v -----
// --- ROUTE UNTUK FILE MANAGER ---
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

