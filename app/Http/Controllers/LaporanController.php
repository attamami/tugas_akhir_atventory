<?php

namespace App\Http\Controllers;

use App\Exports\PembelianExport;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
use App\Exports\PenjualanExport;
use App\Models\Pembelian;
use Maatwebsite\Excel\Facades\Excel;


class LaporanController extends Controller
{
    public function index()
    {
        $lap_pembelian = DB::table('pembelians')
                ->Join('barangs', 'pembelians.id_barang', '=', 'barangs.id_barang')
                ->Join('suppliers', 'pembelians.id_supplier', '=', 'suppliers.id_supplier')
                ->select(
                    'pembelians.id_pembelian',
                    'pembelians.tgl_beli',
                    'suppliers.nama_supplier',
                    // 'pembelians.id_barang',
                    'barangs.nama_barang',
                    'barangs.jenis_barang',
                    'barangs.harga_jual',
                    'barangs.satuan',
                    'pembelians.jumlah',
                    'pembelians.totalhrg',
                    
                )
            ->orderBy('pembelians.id','desc')
            ->get();
            
        $lap_penjualan = DB::table('penjualans')
            ->Join('barangs', 'penjualans.id_barang', '=', 'barangs.id_barang')
            ->Join('salesds', 'penjualans.id_sales', '=', 'salesds.id_sales')
            ->Join('outlets', 'penjualans.id_outlet', '=', 'outlets.id_outlet')
            ->select(
                'penjualans.id_penjualan',
                'salesds.nama_sales',
                'penjualans.tgl_jual',
                'outlets.nama_outlet',
                // 'penjualans.id_barang',
                'barangs.nama_barang',
                'barangs.jenis_barang',
                'barangs.harga_jual',
                'barangs.satuan',
                'penjualans.jumlah',
                'penjualans.totalhrg',
                
            )
            ->orderBy('penjualans.id','desc')
            ->get();
        return view('laporan.index', compact('lap_pembelian','lap_penjualan'));
    }

    public function print_penjualan(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        if($tgl_awal AND $tgl_akhir){
            $lap_penjualan = DB::table('penjualans')
                ->Join('barangs', 'penjualans.id_barang', '=', 'barangs.id_barang')
                ->Join('salesds', 'penjualans.id_sales', '=', 'salesds.id_sales')
                ->Join('outlets', 'penjualans.id_outlet', '=', 'outlets.id_outlet')
                ->select(
                    'penjualans.id_penjualan',
                    'salesds.nama_sales',
                    'penjualans.tgl_jual',
                    'outlets.nama_outlet',
                    // 'penjualans.id_barang',
                    'barangs.nama_barang',
                    'barangs.jenis_barang',
                    'barangs.harga_jual',
                    'barangs.satuan',
                    'penjualans.jumlah',
                    'penjualans.totalhrg',
                    
                )
                ->whereBetween('penjualans.tgl_jual',[$tgl_awal,$tgl_akhir])
                ->get();

            $sum_total = Penjualan::whereBetween('tgl_jual',[$tgl_awal, $tgl_akhir])
                ->get();
        }
        else{
            $lap_penjualan = DB::table('penjualans')
                ->leftJoin('barangs', 'penjualans.id_barang', '=', 'barangs.id_barang')
                ->get();
        }
        // $lap_penjualan = DB::table('penjualans')
        //     ->leftJoin('barangs', 'penjualans.id_barang', '=', 'barangs.id_barang')
        //     ->get();
        return view('laporan.print_penjualan', compact('lap_penjualan','sum_total','tgl_awal','tgl_akhir'));
    }
    public function print_pembelian(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        if($tgl_awal AND $tgl_akhir){
            $lap_pembelian = DB::table('pembelians')
                ->Join('barangs', 'pembelians.id_barang', '=', 'barangs.id_barang')
                ->Join('suppliers', 'pembelians.id_supplier', '=', 'suppliers.id_supplier')
                ->select(
                    'pembelians.id_pembelian',
                    'pembelians.tgl_beli',
                    'suppliers.nama_supplier',
                    // 'pembelians.id_barang',
                    'barangs.nama_barang',
                    'barangs.jenis_barang',
                    'barangs.harga_jual',
                    'barangs.satuan',
                    'pembelians.jumlah',
                    'pembelians.totalhrg',
                    
                )
                ->whereBetween('pembelians.tgl_beli',[$tgl_awal,$tgl_akhir])
                ->get();

            $sum_total = Pembelian::whereBetween('tgl_beli',[$tgl_awal, $tgl_akhir])
                ->get();
        }
        else{
            $lap_penjualan = DB::table('pembelians')
                ->leftJoin('barangs', 'pembelians.id_barang', '=', 'barangs.id_barang')
                ->get();
        }
        // $lap_pembelian = DB::table('pembelians')
        //     ->leftJoin('barangs', 'pembelians.id_barang', '=', 'barangs.id_barang')
        //     ->get();
        return view('laporan.print_pembelian', compact('lap_pembelian','sum_total','tgl_awal','tgl_akhir'));
    }
    public function export_penjualan(Request $request){
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        return Excel::download(new PenjualanExport($tgl_awal,$tgl_akhir), 'data_penjualan.xlsx');
    }
    public function export_pembelian(Request $request){
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        return Excel::download(new PembelianExport($tgl_awal,$tgl_akhir), 'data_pembelian.xlsx');
    }

}
