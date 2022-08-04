<?php

namespace App\Http\Controllers;

use App\Models\Restok;
use App\Models\Supplier;
use App\Models\Barang;
use Illuminate\Http\Request;

class RestokController extends Controller
{
    public function index()
    {
        $data['restok'] = Restok::orderBy('id','asc')->paginate();
        return view('restok.index', $data);
    }

    public function create()
    {
        $suppliers = Supplier::get();
        $barangs = Barang::get();
        return view('restok.create', compact('suppliers','barangs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_restok' => 'required',
            'id_supplier' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'totalhrg' => 'required',
            'tgl_beli' => 'required',
        ]);
        $restok = new Restok();
        $restok->id_restok = $request->id_restok;
        $restok->id_supplier = $request->id_supplier;
        $restok->id_barang = $request->id_barang;
        $restok->jumlah = $request->jumlah;
        $restok->totalhrg = $request->totalhrg;
        $restok->tgl_beli = $request->tgl_beli;
        $restok->save();

        // dd($request->id_barang);
        $barang = Barang::where('id_barang',$request->id_barang)->first();
        // dd($barang->stok);
        $barang->stok += $request->jumlah;
        $barang->save();
        
        return redirect()->route('restok.index')->with('success','Data Pembelian Telah Berhasil Ditambahkan.');
    }

    // public function show(Restok $restok)
    // {
    //     return view('restok.detail',compact('restok'));
    // }

    // public function edit(Restok $restok)
    // {
    //     $suppliers = Supplier::get();
    //     $barangs = Barang::get();
    //     return view('restok.edit',compact('restok','suppliers','barangs'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'id_restok' => 'required',
    //         'nama_supplier' => 'required',
    //         'telp' => 'required',
    //         'alamat' => 'required',
    //         'id_barang' => 'required',
    //         'nama_barang' => 'required',
    //         'jenis_barang' => 'required',
    //         'harga' => 'required',
    //         'satuan' => 'required',
    //         'jumlah' => 'required',
    //         'totalhrg' => 'required',
    //         'tgl_beli' => 'required',
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

    public function destroy(Restok $restok)
    {
        $restok->delete();
        return redirect()->route('restok.index')->with('success','Data Pembelian Telah Berhasil Dihapus');
    }
}
