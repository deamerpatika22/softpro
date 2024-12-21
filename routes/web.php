<?php

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

Route::get('/',[App\Http\Controllers\HomePageController::class, 'index']);

Route::get('/about',[App\Http\Controllers\HomePageController::class, 'about']);

Route::get('/kontak',[App\Http\Controllers\HomePageController::class, 'kontak']);

Route::get('/kategori', [\App\Http\Controllers\HomepageController::class, 'kategori']);



Route::group(['prefix' => 'admin','middleware'=>'auth'], function() {



    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('admin');

    Route::post('/webhook', [\App\Http\Controllers\DialogflowWebhookController::class, 'handleWebhook']);

    Route::resource('/history', \App\Http\Controllers\HistoryController::class,);

      //Tambahan route package kategori
      Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);

      //Tambahan route package Produk
      Route::resource('/produk', \App\Http\Controllers\ProdukController::class);
  
      //Tambahan route package Customer
      Route::resource('/customer', \App\Http\Controllers\CustomerController::class);

      // Tambahan route package laproan
      Route::get('/laporan', [\App\Http\Controllers\LaporanController::class, 'index']);
      Route::get('/proseslaporan', [\App\Http\Controllers\LaporanController::class, 'proses']);

      // image
      Route::get('image', [\App\Http\Controllers\ImageController::class, 'index'])->name('image.index');
      // simpan image
      Route::post('image', [\App\Http\Controllers\ImageController::class, 'store'])->name('image.store');
      // hapus image by id
      Route::delete('image/{id}', [\App\Http\Controllers\ImageController::class, 'destroy'])->name('image.destroy');
      // upload image ketegori
      Route::post('imagekategori', [\App\Http\Controllers\KategoriController::class, 'uploadimage']);
      // hapus image kategori
      Route::post('imagekategori/{id}', [\App\Http\Controllers\KategoriController::class, 'deleteimage']);
      // upload image produk
      Route::post('produkimage', [\App\Http\Controllers\ProdukController::class, 'uploadimage']);
      // hapus image produk
      Route::delete('produkimage/{id}', [\App\Http\Controllers\ProdukController::class, 'deleteimage']);
      // slideshow
      Route::resource('slideshow', \App\Http\Controllers\SlideshowController::class);
      // produk promo
      Route::resource('promo', \App\Http\Controllers\ProdukPromoController::class);
      // load async produk
      Route::get('loadprodukasync/{id}', [\App\Http\Controllers\ProdukController::class, 'loadasync']);

    });

// Route::get('/aboutus', function () {
//     return view('welcome');
// });

// Route::get('/halo', function () {
//     return "Hallo Saya Albert";
// });

// Route::get('/latihan', [App\Http\Controllers\LatihanController::class, 'index']);

// Route::get('/beranda', [App\Http\Controllers\LatihanController::class, 'beranda']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
