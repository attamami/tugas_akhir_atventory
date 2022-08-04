<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Laporanpenjualan;

class LaporanpenjualanController extends Controller
{
    public function index()
    {
        $data['laporan_penjualan'] = Penjualan::orderBy('id','asc')->paginate();
        return view('laporan_penjualan.index', $data);
    }

    public function search(Request $request){
        $tglAwal = $request->input('tglAwal');
        $tglAkhir =  $request->input('tglAkhir');

        $query['laporan_penjualan'] = Penjualan::select('*')
        ->where('tgl_jual', '>=', $tglAwal)
        ->where('tgl_jual', '<=', $tglAkhir)
        ->get();
        return view('laporan_penjualan.index', $query);
    }
}
