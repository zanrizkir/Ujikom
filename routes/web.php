<?php

use App\Models\Admin\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\KotaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\FrontController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TopUpController;
use App\Http\Controllers\Admin\AlamatController;
use App\Http\Controllers\Admin\ProdukController;
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

Route::get('/', function () {
    return view('template');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/dashboard',DashboardController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/subkategori', SubKategoriController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/produk/checkSlug', [ProdukController::class, 'checkSlug']);
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
    Route::get('getKecamatan/{id}', [KecamatanController::class, 'getKecamatan']);
});

Auth::routes();
Route::group(['prefix' => '/'], function () {
    Route::get('/produk', [FrontController::class, 'produkuser']);
    Route::get('/detailproduk/{id}', [FrontController::class, 'produkdetail']);
    Route::resource('/keranjang', KeranjangController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');





