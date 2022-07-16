<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Jenisbarang;
use App\Models\Satuan;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data['barang'] = Barang::orderBy('id','asc')->paginate();
        return view('barang.index', $data);
    }

    public function create()
    {
        $jenisbarang = Jenisbarang::get();
        $satuans = Satuan::get();
        return view('barang.create', compact('jenisbarang','satuans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
        ]);
        $barang = new Barang();
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->harga = $request->harga;
        $barang->satuan = $request->satuan;
        $barang->save();
        return redirect()->route('barang.index')->with('success','Data Barang Telah Berhasil Ditambahkan.');
    }

    public function show(Barang $barang)
    {
        return view('barang.detail',compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $jenisbarang = Jenisbarang::get();
        $satuans = Satuan::get();
        return view('barang.edit',compact('barang','jenisbarang','satuans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
        ]);
        $barang = Barang::find($id);
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->harga = $request->harga;
        $barang->satuan = $request->satuan;
        $barang->save();
        return redirect()->route('barang.index')->with('success','Data Barang Telah Berhasil Diubah');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success','Data Barang Telah Berhasil Dihapus');
    }
}
