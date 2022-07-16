<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $data['supplier'] = Supplier::orderBy('id','asc')->paginate();
        return view('supplier.index', $data);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_supplier' => 'required',
            'nama_supplier' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);
        $supplier = new Supplier();
        $supplier->id_supplier = $request->id_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->telp = $request->telp;
        $supplier->alamat = $request->alamat;
        $supplier->save();
        return redirect()->route('supplier.index')->with('success','Data Supplier Telah Berhasil Ditambahkan');
    }

    // public function show(Supplier $supplier)
    // {
    //     return view('supplier.show',compact('supplier'));
    // }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit',compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_supplier' => 'required',
            'nama_supplier' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);
        $supplier = Supplier::find($id);
        $supplier->id_supplier = $request->id_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->telp = $request->telp;
        $supplier->alamat = $request->alamat;
        $supplier->save();
        return redirect()->route('supplier.index')->with('success','Data Supplier Telah Berhasil Diubah');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success','Data Supplier Telah Berhasil Dihapus');
    }
}
