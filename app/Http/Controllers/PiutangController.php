<?php

namespace App\Http\Controllers;

use App\Models\Jenishutang;
use App\Models\Lunashutang;
use App\Models\Outlet;
use App\Models\Piutang;
use Illuminate\Http\Request;

class PiutangController extends Controller
{
    public function index()
    {
        $data['piutang'] = Piutang::orderBy('id','asc')->get();
        return view('piutang.index', $data);
    }

    public function create()
    {
        $outlets = Outlet::get();
        $lunashutangs = Lunashutang::get();
        $jenishutangs = Jenishutang::get();
        return view('piutang.create', compact('outlets','lunashutangs','jenishutangs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_piutang' => 'required',
            'id_outlet' => 'required',
            'nominal_hutang' => 'required',
            'nominal_terbayar' => 'required',
            'jenis_hutang' => 'required',
            'tgl_hutang' => 'required',
            'jatuh_tempo' => 'required',
            'ket_lunas' => 'required',
        ]);
        $piutang = new Piutang();
        $piutang->id_piutang = $request->id_piutang;
        $piutang->id_outlet = $request->id_outlet;
        $piutang->nominal_hutang = $request->nominal_hutang;
        $piutang->nominal_terbayar = $request->nominal_terbayar;
        $piutang->jenis_hutang = $request->jenis_hutang;
        $piutang->tgl_hutang = $request->tgl_hutang;
        $piutang->jatuh_tempo = $request->jatuh_tempo;
        $piutang->ket_lunas = $request->ket_lunas;
        $piutang->save();

        return redirect()->route('piutang.index')->with('success','Data Piutang Telah Berhasil Ditambahkan.');
    }

    public function edit(Piutang $piutang)
    {
        $outlets = Outlet::get();
        $lunashutangs = Lunashutang::get();
        $jenishutangs = Jenishutang::get();
        return view('piutang.edit',compact('piutang','outlets','lunashutangs','jenishutangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_piutang' => 'required',
            'id_outlet' => 'required',
            'nominal_hutang' => 'required',
            'nominal_terbayar' => 'required',
            'jenis_hutang' => 'required',
            'tgl_hutang' => 'required',
            'jatuh_tempo' => 'required',
            'ket_lunas' => 'required',
        ]);

        if($request->nominal_terbayar > $request->nominal_hutang){
            return redirect()->route('piutang.index')->with('error','Nominal Pembayaran Melebihi Nominal Hutang!');
        }
        elseif($request->nominal_terbayar < 0){
            return redirect()->route('piutang.index')->with('error','Nominal Pembayaran Tidak Valid!');
        }
        else{
            $piutang = Piutang::find($id);
            $piutang->id_piutang = $request->id_piutang;
            $piutang->id_outlet = $request->id_outlet;
            $piutang->nominal_hutang = $request->nominal_hutang;
            $piutang->nominal_terbayar = $request->nominal_terbayar;
            $piutang->jenis_hutang = $request->jenis_hutang;
            $piutang->tgl_hutang = $request->tgl_hutang;
            $piutang->jatuh_tempo = $request->jatuh_tempo;
            $piutang->ket_lunas = $request->ket_lunas;
            $piutang->save();

            return redirect()->route('piutang.index')->with('success','Data Piutang Telah Berhasil Diubah');
        }
    }

    public function destroy(Piutang $piutang)
    {
        $piutang->delete();
        return redirect()->route('piutang.index')->with('success','Data Piutang Telah Berhasil Dihapus');
    }
}
