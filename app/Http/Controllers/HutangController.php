<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\Lunashutang;
use App\Models\Jenishutang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    public function index()
    {
        $data['hutang'] = Hutang::orderBy('id','asc')->paginate();
        return view('hutang.index', $data);
    }

    public function create()
    {
        $suppliers = Supplier::get();
        $lunashutangs = Lunashutang::get();
        $jenishutangs = Jenishutang::get();
        return view('hutang.create', compact('suppliers','lunashutangs','jenishutangs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_hutang' => 'required',
            'id_supplier' => 'required',
            'nominal_hutang' => 'required',
            'nominal_terbayar' => 'required',
            'jenis_hutang' => 'required',
            'tgl_hutang' => 'required',
            'jatuh_tempo' => 'required',
            'ket_lunas' => 'required',
        ]);
        $hutang = new Hutang();
        $hutang->id_hutang = $request->id_hutang;
        $hutang->id_supplier = $request->id_supplier;
        $hutang->nominal_hutang = $request->nominal_hutang;
        $hutang->nominal_terbayar = $request->nominal_terbayar;
        $hutang->jenis_hutang = $request->jenis_hutang;
        $hutang->tgl_hutang = $request->tgl_hutang;
        $hutang->jatuh_tempo = $request->jatuh_tempo;
        $hutang->ket_lunas = $request->ket_lunas;
        $hutang->save();

        return redirect()->route('hutang.index')->with('success','Data Hutang Telah Berhasil Ditambahkan.');
    }

    public function edit(Hutang $hutang)
    {
        $suppliers = Supplier::get();
        $lunashutangs = Lunashutang::get();
        $jenishutangs = Jenishutang::get();
        return view('hutang.edit',compact('hutang','suppliers','lunashutangs','jenishutangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_hutang' => 'required',
            'id_supplier' => 'required',
            'nominal_hutang' => 'required',
            'nominal_terbayar' => 'required',
            'jenis_hutang' => 'required',
            'tgl_hutang' => 'required',
            'jatuh_tempo' => 'required',
            'ket_lunas' => 'required',
        ]);
        if($request->nominal_terbayar > $request->nominal_hutang){
            return redirect()->route('hutang.index')->with('error','Nominal Pembayaran Melebihi Nominal Hutang!');
        }
        elseif($request->nominal_terbayar < 0){
            return redirect()->route('hutang.index')->with('error','Nominal Pembayaran Tidak Valid!');
        }
        else{
            $hutang = Hutang::find($id);
            $hutang->id_hutang = $request->id_hutang;
            $hutang->id_supplier = $request->id_supplier;
            $hutang->nominal_hutang = $request->nominal_hutang;
            $hutang->nominal_terbayar = $request->nominal_terbayar;
            $hutang->jenis_hutang = $request->jenis_hutang;
            $hutang->tgl_hutang = $request->tgl_hutang;
            $hutang->jatuh_tempo = $request->jatuh_tempo;
            $hutang->ket_lunas = $request->ket_lunas;
            $hutang->save();

            return redirect()->route('hutang.index')->with('success','Data Piutang Telah Berhasil Diubah');
        }
    }

    public function destroy(Hutang $hutang)
    {
        $hutang->delete();
        return redirect()->route('hutang.index')->with('success','Data Hutang Telah Berhasil Dihapus');
    }
}
