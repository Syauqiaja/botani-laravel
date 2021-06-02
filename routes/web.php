<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RatingController;
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
    Route::post('/search', [ProdukController::class, 'search'])->name('produk.search');
    Route::post('/rate/{produk}', [ProdukController::class, 'rate'])->name('produk.rate');
    Route::post('/', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/{produk}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::patch('/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

Route::get('/users/riwayat', [UserController::class, 'riwayat'])->name('user.riwayat');
Route::get('/users/penjual', [UserController::class, 'penjual']);
Route::get('/users/admin', [UserController::class, 'admin']);
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/users/', [UserController::class, 'index'])->name('user.index');

Route::get('/admin/user', [AdminController::class, 'manageUser'])->name('admin.user');
Route::get('/admin/blog', [AdminController::class, 'manageBlog'])->name('admin.blog');
Route::get('/admin/produk', [AdminController::class, 'manageProduk'])->name('admin.produk');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Buat Test biar bisa edit nanti disesuaikan aja gpp :v
Route::get('/createproduct',[HomeController::class,'createProduct']); //create produk toko
Route::get('/editproduct',[HomeController::class,'editProduct']); //edit produk toko
Route::get('/showproduct',[HomeController::class,'showProduct']);//show product dashboard toko
Route::get('/showuser',[HomeController::class,'showUser']);//show user dashboard admin

Route::post('/pemesanans/', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanans/{pemesanan}/bayar', [PemesananController::class, 'bayar'])->name('pemesanan.bayar');
Route::patch('/pemesanans/{pemesanan}/kirim', [PemesananController::class, 'kirim'])->name('pemesanan.kirim');
Route::patch('/pemesanans/{pemesanan}/bayar', [PemesananController::class, 'bayarStore'])->name('pemesanan.bayar.store');
Route::get('/pemesanans/{pemesanan}', [PemesananController::class, 'show'])->name('pemesanan.show');
Route::get('/pemesanans/{pemesanan}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::patch('/pemesanans/{pemesanan}', [PemesananController::class, 'update'])->name('pemesanan.update');


Route::get('/tokos/create', [TokoController::class, 'create'])->name('toko.create');
Route::get('/tokos/manage', [TokoController::class, 'manageProduk'])->name('toko.manage');
Route::get('/tokos/manage/produk', [TokoController::class, 'manageProduk'])->name('toko.manage.produk');
Route::get('/tokos/manage/blog', [TokoController::class, 'manageBlog'])->name('toko.manage.blog');
Route::get('/tokos//manage/pesanan', [TokoController::class, 'managePesanan'])->name('toko.manage.pesanan');
Route::post('/tokos', [TokoController::class, 'store'])->name('toko.store');
Route::get('/tokos/{toko}', [TokoController::class, 'show'])->name('toko.show');

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
// Blog comment reply system
Route::post('/blogs/comment', [CommentController::class, 'store'])->name('blog.comment')->middleware('auth');
Route::post('/blogs/reply', [CommentController::class, 'replystore'])->name('blog.reply')->middleware('auth');
Route::post('/blogs/create', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::post('/blogs/rate/{blog}', [BlogController::class, 'rate'])->name('blog.rate')->middleware('auth');
Route::post('/blogs/list', [BlogController::class, 'list'])->name('blog.list');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::patch('/blogs/{blog}', [BlogController::class, 'update'])->name('blog.update')->middleware('auth');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('auth');

Route::get('shopgrid', function(){
    return view('Produk.search');
});
// ---- Penting v v v -----
// --- ROUTE UNTUK FILE MANAGER ---
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

