<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesdController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\LaporanpenjualanController;
use App\Http\Controllers\LaporanpembelianController;

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


Route::controller(AuthController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/postLogin','postLogin')->name('postLogin');
    Route::get('logout','logout')->name('logout');
});

// Route::get('/', function () {
//     return view('home');
// })->middleware('NoBackButton')->middleware('auth');   

Route::resource('home', HomeController::class);
Route::resource('/', HomeController::class);

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['CheckLevel:1']],function(){

        Route::resource('salesd', SalesdController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('outlet', OutletController::class);
        Route::resource('barang', BarangController::class);
        Route::resource('pembelian', PembelianController::class);
        Route::resource('penjualan', PenjualanController::class);
        Route::resource('piutang', PiutangController::class);
        Route::resource('hutang', HutangController::class);
        Route::resource('manajemen_user', ManajemenUserController::class);

        // Route::get('laporan_penjualan', [LaporanpenjualanController::class, 'index'])->name('laporan_penjualan.index');
        // Route::get('laporan_penjualan/print', [LaporanpenjualanController::class, 'print'])->name('laporan_penjualan.print');
        // Route::post('laporan_penjualan/search', [LaporanpenjualanController::class, 'search'])->name('laporan_penjualan.search');
        Route::resource('laporan_penjualan', LaporanpenjualanController::class);

        // Route::get('laporan_pembelian', [Laporanpembelian::class, 'index'])->name('laporan_pembelian.index');
        // Route::get('laporan_pembelian/print', [Laporanpembelian::class, 'print'])->name('laporan_pembelian.print');
        // Route::resource('laporan_pembelian', Laporanpembelian::class);
    });

    Route::group(['middleware' => ['CheckLevel:1,2' ]],function(){
        
        Route::resource('barang', BarangController::class);
        Route::resource('penjualan', PenjualanController::class);
        Route::resource('piutang', PiutangController::class);
    });
});


