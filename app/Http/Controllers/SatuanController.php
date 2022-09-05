<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Jenisbarang;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(){
        $jenisbarang = Jenisbarang::get();
        $satuans = Satuan::get();
        return view('barang.create', compact('jenisbarang','satuans'));
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
            'nama_satuan' => 'required',
        ]);
        $satuan = new Satuan();
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->save();
        return redirect()->route('barang.create')->with('success','Data Satuan Telah Berhasil Ditambahkan.');
    }

}
