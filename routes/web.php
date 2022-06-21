<?php

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\LoginController;

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
// pertama kali di buka

// Route::get('/', function () {
//   $data = Barang::all();
//   return view('welcome', compact('data'));
// });
Route::get('/', [WelcomeController::class, 'index']);

// Barang controller
Route::middleware(['auth', 'admin'])->group(function () {
  Route::resource('barang', BarangController::class)->only('index', 'store', 'create', 'edit');
  Route::put('barang/{id}', [BarangController::class, 'update']);
  Route::get('hapusbarang/{id}', [BarangController::class, 'destroy']);
  Route::get('export', [BarangController::class, 'export']);


  Route::resource('kategori', KategoriController::class)->only('index', 'store', 'create', 'edit');
  Route::put('kategori/{id}', [KategoriController::class, 'update']);
  Route::get('hapuskategori/{id}', [KategoriController::class, 'destroy']);
  // Route::get('export', [KategoriController::class, 'export']);

  Route::resource('pengguna', PenggunaController::class)->only('index', 'store', 'create', 'edit');
  Route::put('pengguna/{id}', [PenggunaController::class, 'update']);
  Route::get('hapuspengguna/{id}', [PenggunaController::class, 'destroy']);
  // Route::get('export', [KategoriController::class, 'export']);
});
Route::post('/logout', [LoginController::class, 'logout']);
// ketika masuk ke home/admin backand


Auth::routes();

// ketika masuk ke home/ user backand
Route::get('user', [BarangController::class, 'user'])->middleware(['auth', 'user']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
