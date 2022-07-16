<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Stok;

class StokController extends Controller
{
    public function index()
    {
        $data['stok'] = Stok::orderBy('id','asc')->paginate();
        return view('stok.index', $data);
    }

    public function create()
    {
        $barangs = Barang::get();
        return view('stok.create', compact('barangs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
        ]);
        $stok = new Stok();
        $stok->id_barang = $request->id_barang;
        $stok->nama_barang = $request->nama_barang;
        $stok->satuan = $request->satuan;
        $stok->stok = $request->stok;
        $stok->save();
        return redirect()->route('stok.index')->with('success','Data Stok Telah Berhasil Ditambahkan.');
    }
    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success','Data Stok Telah Berhasil Dihapus');
    }
}
