<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Outlet;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $coutlet = Outlet::count();
        // $outlet = DB::table('outlets')->get();
        $outlet = Outlet::get();
        $barang = Barang::get();
        // $piutang = DB::table('piutangs')->get();
        $piutang = DB::table('piutangs')
            ->leftJoin('outlets', 'piutangs.id_outlet', '=', 'outlets.id_outlet')
            ->get();

        $date = date('Y-m-d');
        $jual_today = Penjualan::where('tgl_jual','=', $date)->count();
        $beli_today = Pembelian::where('tgl_beli','=', $date)->count();

        $penjualan = Penjualan::count();
        $pembelian = Pembelian::count();

        $jual_jan = Penjualan::whereMonth('tgl_jual','01')->count();
        $jual_feb = Penjualan::whereMonth('tgl_jual','02')->count();
        $jual_mar = Penjualan::whereMonth('tgl_jual','03')->count();
        $jual_apr = Penjualan::whereMonth('tgl_jual','04')->count();
        $jual_mei = Penjualan::whereMonth('tgl_jual','05')->count();
        $jual_jun = Penjualan::whereMonth('tgl_jual','06')->count();
        $jual_jul = Penjualan::whereMonth('tgl_jual','07')->count();
        $jual_aug = Penjualan::whereMonth('tgl_jual','08')->count();
        $jual_sep = Penjualan::whereMonth('tgl_jual','09')->count();
        $jual_okt = Penjualan::whereMonth('tgl_jual','10')->count();
        $jual_nov = Penjualan::whereMonth('tgl_jual','11')->count();
        $jual_des = Penjualan::whereMonth('tgl_jual','12')->count();
        
        $beli_jan = Pembelian::whereMonth('tgl_beli','01')->count();
        $beli_feb = Pembelian::whereMonth('tgl_beli','02')->count();
        $beli_mar = Pembelian::whereMonth('tgl_beli','03')->count();
        $beli_apr = Pembelian::whereMonth('tgl_beli','04')->count();
        $beli_mei = Pembelian::whereMonth('tgl_beli','05')->count();
        $beli_jun = Pembelian::whereMonth('tgl_beli','06')->count();
        $beli_jul = Pembelian::whereMonth('tgl_beli','07')->count();
        $beli_aug = Pembelian::whereMonth('tgl_beli','08')->count();
        $beli_sep = Pembelian::whereMonth('tgl_beli','09')->count();
        $beli_okt = Pembelian::whereMonth('tgl_beli','10')->count();
        $beli_nov = Pembelian::whereMonth('tgl_beli','11')->count();
        $beli_des = Pembelian::whereMonth('tgl_beli','12')->count();

        return view('home', compact(
            'outlet',
            'barang',
            'piutang',
            'coutlet',
            'jual_today',
            'beli_today',
            'penjualan',
            'pembelian',
            'jual_jan',
            'jual_feb',
            'jual_mar',
            'jual_apr',
            'jual_mei',
            'jual_jun',
            'jual_jul',
            'jual_aug',
            'jual_sep',
            'jual_okt',
            'jual_nov',
            'jual_des',
            'beli_jan',
            'beli_feb',
            'beli_mar',
            'beli_apr',
            'beli_mei',
            'beli_jun',
            'beli_jul',
            'beli_aug',
            'beli_sep',
            'beli_okt',
            'beli_nov',
            'beli_des',
        ));
    }
}
