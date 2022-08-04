<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Outlet;
use App\Models\Barang;

class PenjualanController extends Controller
{
    public function index()
    {
        $data['penjualan'] = Penjualan::orderBy('id','asc')->paginate();
        return view('penjualan.index', $data);
    }

    public function create()
    {
        $outlets = Outlet::get();
        $barangs = Barang::get();
        return view('penjualan.create', compact('outlets','barangs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required',
            'id_outlet' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'totalhrg' => 'required',
            'tgl_jual' => 'required',
        ]);
        
        // dd($request->id_barang);
        $barang = Barang::where('id_barang',$request->id_barang)->first();
        // dd($barang->stok);
        if($barang->stok < $request->jumlah){
            return redirect()->route('penjualan.create')->with('error','Jumlah Barang Melebihi Persediaan Stok!');
        }
        else{
            $penjualan = new Penjualan();
            $penjualan->id_penjualan = $request->id_penjualan;
            $penjualan->id_outlet = $request->id_outlet;
            $penjualan->id_barang = $request->id_barang;
            $penjualan->jumlah = $request->jumlah;
            $penjualan->totalhrg = $request->totalhrg;
            $penjualan->tgl_jual = $request->tgl_jual;
            $penjualan->save();
            $barang->stok -= $request->jumlah;
            $barang->save();
        
        return redirect()->route('penjualan.index')->with('success','Data Penjualan Telah Berhasil Ditambahkan.');
        }
        
    }

    // public function show(Penjualan $penjualan)
    // {
    //     return view('penjualan.detail',compact('penjualan'));
    // }

    // public function edit(Penjualan $penjualan)
    // {
    //     $outlets = Outlet::get();
    //     $barangs = Barang::get();
    //     return view('penjualan.edit',compact('penjualan','outlets','barangs'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
            // 'id_penjualan' => 'required',
            // 'id_outlet' => 'required',
            // 'telp' => 'required',
            // 'alamat' => 'required',
            // 'id_barang' => 'required',
            // 'nama_barang' => 'required',
            // 'jenis_barang' => 'required',
            // 'harga' => 'required',
            // 'satuan' => 'required',
            // 'jumlah' => 'required',
            // 'totalhrg' => 'required',
            // 'tgl_jual' => 'required',
    //     ]);
    //     $restok = Restok::find($id);
    //     $restok->id_restok = $request->id_restok;
    //     $restok->nama_supplier = $request->nama_supplier;
    //     $restok->telp = $request->telp;
    //     $restok->alamat = $request->alamat;
    //     $restok->id_barang = $request->id_barang;
    //     $restok->nama_barang = $request->nama_barang;
    //     $restok->jenis_barang = $request->jenis_barang;
    //     $restok->harga = $request->harga;
    //     $restok->satuan = $request->satuan;
    //     $restok->jumlah = $request->jumlah;
    //     $restok->totalhrg = $request->totalhrg;
    //     $restok->tgl_beli = $request->tgl_beli;
    //     $restok->save();
    //     return redirect()->route('restok.index')->with('success','Data Pembelian Telah Berhasil Diubah');
    // }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success','Data Penjualan Telah Berhasil Dihapus');
    }
}
