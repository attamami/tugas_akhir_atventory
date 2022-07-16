<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesdController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\BrgbaruController;
use App\Http\Controllers\RestokController;
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
    return view('home');
});

Route::get('salesd', [SalesdController::class, 'index'])->name('salesd.index');
Route::get('salesd/create', [SalesdController::class, 'create'])->name('salesd.create');
Route::resource('salesd', SalesdController::class);

Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::resource('supplier', SupplierController::class);

Route::get('outlet', [OutletController::class, 'index'])->name('outlet.index');
Route::get('outlet/create', [OutletController::class, 'create'])->name('outlet.create');
Route::resource('outlet', OutletController::class);

Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::get('barang/show/{id}', [BarangController::class, 'show'])->name('barang.show');
Route::resource('barang', BarangController::class);

Route::get('stok', [StokController::class, 'index'])->name('stok.index');
Route::get('stok/create', [StokController::class, 'create'])->name('stok.create');
Route::resource('stok', StokController::class);

Route::get('brgbaru', [BrgbaruController::class, 'index'])->name('brgbaru.index');
Route::get('brgbaru/create', [BrgbaruController::class, 'create'])->name('brgbaru.create');
Route::get('brgbaru/show/{id}', [BrgbaruController::class, 'show'])->name('brgbaru.show');
Route::resource('brgbaru', BrgbaruController::class);

Route::get('restok', [RestokController::class, 'index'])->name('restok.index');
Route::get('restok/create', [RestokController::class, 'create'])->name('restok.create');
Route::get('restok/show/{id}', [RestokController::class, 'show'])->name('restok.show');
Route::resource('restok', RestokController::class);