<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brgbaru;
use App\Models\Satuan;
use App\Models\Jenisbarang;
use App\Models\Supplier;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;


class BrgbaruController extends Controller
{
    public function index()
    {
        $data['brgbaru'] = Brgbaru::orderBy('id','asc')->paginate();
        return view('brgbaru.index', $data);
    }

    public function create()
    {
        $satuans = Satuan::get();
        $suppliers = Supplier::get();
        $jenisbarang = Jenisbarang::get();
        return view('brgbaru.create', compact('suppliers','satuans','jenisbarang'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_beli' => 'required',
            'id_supplier' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'totalhrg' => 'required',
            'tgl_beli' => 'required',
        ]);
        $brgbaru = new Brgbaru();
        $brgbaru->id_beli = $request->id_beli;
        $brgbaru->id_supplier = $request->id_supplier;
        $brgbaru->id_barang = $request->id_barang;
        $brgbaru->jumlah = $request->jumlah;
        $brgbaru->totalhrg = $request->totalhrg;
        $brgbaru->tgl_beli = $request->tgl_beli;
        $brgbaru->save();

        $barang = new Barang();
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->satuan = $request->satuan;
        $barang->stok = $request->jumlah;
        $barang->save();

        return redirect()->route('brgbaru.index')->with('success','Data Pembelian Telah Berhasil Ditambahkan.');
    }

    // public function show(Brgbaru $brgbaru)
    // {
    //     return view('brgbaru.detail',compact('brgbaru'));
    // }

    public function edit(Brgbaru $brgbaru)
    {
        $satuans = Satuan::get();
        $suppliers = Supplier::get();
        $barangs = Barang::get();
        $jenisbarang = Jenisbarang::get();
        return view('brgbaru.edit',compact('brgbaru','suppliers','barangs','satuans','jenisbarang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_beli' => 'required',
            'id_supplier' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'totalhrg' => 'required',
            'tgl_beli' => 'required',
        ]);
        $brgbaru = Brgbaru::find($id);
        $brgbaru->id_beli = $request->id_beli;
        $brgbaru->id_supplier = $request->id_supplier;
        $brgbaru->id_barang = $request->id_barang;
        $brgbaru->jumlah = $request->jumlah;
        $brgbaru->totalhrg = $request->totalhrg;
        $brgbaru->tgl_beli = $request->tgl_beli;
        $brgbaru->save();
        $barang = Barang::find($id);
        $barang->stok = $request->jumlah;
        $barang->save();
        return redirect()->route('brgbaru.index')->with('success','Data Pembelian Telah Berhasil Diubah');
    }

    public function destroy(Brgbaru $brgbaru)
    {
        $brgbaru->delete();
        return redirect()->route('brgbaru.index')->with('success','Data Pembelian Telah Berhasil Dihapus');
    }
}
