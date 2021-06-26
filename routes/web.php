<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'menu'] );
Route::get('/detail', [HomeController::class, 'detail'] );

Route::get('/admin', [HomeController::class, 'admin'] );
Route::post('/upload/proses', [HomeController::class, 'proses_upload'] );

Route::get('/upload/hapus/{id}', [HomeController::class, 'hapus'] );

Route::get('/cart', [HomeController::class, 'cart'] );
Route::get('/cart/tambah/{id}', [HomeController::class, 'do_tambah_cart'])->where("id", "[0-9]+") ;

Route::get('/cart/hapus/{id}', [HomeController::class, 'do_hapus_cart'])->where("id", "[0-9]+") ;

Route::get('/beli', [HomeController::class, 'beli'] );
