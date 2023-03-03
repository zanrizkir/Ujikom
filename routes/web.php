<?php

use App\Models\Admin\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\KotaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TopUpController;
use App\Http\Controllers\Admin\AlamatController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\KeranjangController;
use App\Http\Controllers\Admin\SubKategoriController;
use App\Http\Controllers\Admin\RiwayatProdukController;
use App\Http\Controllers\Admin\MetodePembayaranController;

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


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/home   ', [App\Http\Controllers\HomeController::class, 'index']);
    Route::resource('/dashboard',DashboardController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/subkategori', SubKategoriController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/produk/{slug}', [ProdukController::class, 'show']);
    Route::get('/produk/{slug}/edit', [ProdukController::class, 'edit']);
    // Route::get('/produk/checkSlug', [ProdukController::class, 'checkSlug']);
    Route::resource('/image', ImageController::class);
    Route::resource('/riwayatProduk', RiwayatProdukController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/metode', MetodePembayaranController::class);
    Route::resource('/topup', TopUpController::class);
    Route::resource('/keranjang', KeranjangController::class);
    Route::get('getSub_kategori/{id}', [SubKategoriController::class, 'getSubKategori']);
    Route::resource('/provinsi', ProvinsiController::class);
    Route::resource('/kota', KotaController::class);
    Route::resource('/kecamatan', KecamatanController::class);
    Route::get('getKota/{id}', [KotaController::class, 'getKota']);
    Route::resource('/alamat', AlamatController::class);
    Route::get('getcity/{id}', [AlamatController::class, 'getCities']);
});

Route::get('/produk', [FrontController::class, 'produkuser']);
Route::get('/detailproduk/{produk}', [FrontController::class, 'produkdetail']);
Route::middleware('auth')->group (function () {
    Route::resource('/keranjang', App\Http\Controllers\KeranjangController::class);
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    Route::resource('/checkout', App\Http\Controllers\CheckoutController::class);
    Route::resource('/alamat',AlamatController::class);
    Route::get('/thanks',[App\Http\Controllers\CheckoutController::class, 'thank']);
    Route::get('/profile', [App\Http\Controllers\FrontController::class, 'profileuser']);
    Route::get('getcity/{id}', [AlamatController::class, 'getCities']);
});
Route::get('/', [App\Http\Controllers\FrontController::class, 'user']);
Auth::routes();


