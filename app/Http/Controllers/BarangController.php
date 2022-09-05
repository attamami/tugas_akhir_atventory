<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Jenisbarang;
use App\Models\Satuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data['barang'] = Barang::orderBy('id','asc')->get();
        return view('barang.index', $data);
    }

    public function create()
    {
        $jenisbarang = Jenisbarang::get();
        $satuans = Satuan::get();

        $q = Barang::select(DB::raw('MAX(RIGHT(id_barang,2)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%02s",$tmp);
            }
        }
        else
        {
        $kd = "01";
        }
        return view('barang.create', compact('jenisbarang','satuans','kd'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
        ]);
        $barang = new Barang();
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->satuan = $request->satuan;
        $barang->stok = $request->stok;
        $barang->save();
        return redirect()->route('barang.index')->with('success','Data Barang Telah Berhasil Ditambahkan.');
    }

    // public function show(Barang $barang)
    // {
    //     return view('barang.detail',compact('barang'));
    // }

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
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
        ]);
        $barang = Barang::find($id);
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->satuan = $request->satuan;
        $barang->stok = $request->stok;
        $barang->save();
        return redirect()->route('barang.index')->with('success','Data Barang Telah Berhasil Diubah');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success','Data Barang Telah Berhasil Dihapus');
    }
}
