<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{
    public function index()
    {
        $data['outlet'] = Outlet::orderBy('id','asc')->get();
        return view('outlet.index', $data);
    }

    public function create()
    {
        $q = Outlet::select(DB::raw('MAX(RIGHT(id_outlet,3)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s",$tmp);
            }
        }
        else
        {
        $kd = "001";
        }
        return view('outlet.create', compact('kd'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required',
            'nama_outlet' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);
        $outlet = new Outlet();
        $outlet->id_outlet = $request->id_outlet;
        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->telp = $request->telp;
        $outlet->alamat = $request->alamat;
        $outlet->save();
        return redirect()->route('outlet.index')->with('success','Data Outlet Telah Berhasil Ditambahkan');
    }

    // public function show(Supplier $supplier)
    // {
    //     return view('supplier.show',compact('supplier'));
    // }

    public function edit(Outlet $outlet)
    {
        return view('outlet.edit',compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_outlet' => 'required',
            'nama_outlet' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);
        $outlet = Outlet::find($id);
        $outlet->id_outlet = $request->id_outlet;
        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->telp = $request->telp;
        $outlet->alamat = $request->alamat;
        $outlet->save();
        return redirect()->route('outlet.index')->with('success','Data Outlet Telah Berhasil Diubah');
    }

    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect()->route('outlet.index')->with('success','Data Outlet Telah Berhasil Dihapus');
    }
}
