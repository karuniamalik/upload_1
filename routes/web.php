<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;

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

Route::get('/', function () {
  return view('welcome');
});

// Barang controller
Route::middleware(['auth', 'admin'])->group(function () {
  Route::resource('barang', BarangController::class)->only('index', 'store', 'create', 'edit');
  Route::post('barang/{id}', [BarangController::class, 'update']);
  Route::get('hapusbarang/{id}', [BarangController::class, 'destroy']);
  Route::get('export', [BarangController::class, 'export']);
  Route::post('/logout', [LoginController::class, 'logout']);
});


// ketika masuk ke home/admin backand


Auth::routes();

// ketika masuk ke home/ user backand
Route::get('user', [HomeController::class, 'user'])->middleware(['auth', 'user']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
