<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesd;

class SalesdController extends Controller
{
    public function index()
    {
        $data['salesd'] = Salesd::orderBy('id','asc')->get();
        return view('salesd.index', $data);
    }

    public function create()
    {
        return view('salesd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sales' => 'required',
            'nama_sales' => 'required',
            'telp' => 'required',
            'area' => 'required',
        ]);
        $salesd = new Salesd();
        $salesd->id_sales = $request->id_sales;
        $salesd->nama_sales = $request->nama_sales;
        $salesd->telp = $request->telp;
        $salesd->area = $request->area;
        $salesd->save();
        return redirect()->route('salesd.index')->with('success','Data Sales Telah Berhasil Ditambahkan');
    }

    // public function show(Supplier $supplier)
    // {
    //     return view('supplier.show',compact('supplier'));
    // }

    public function edit(Salesd $salesd)
    {
        return view('salesd.edit',compact('salesd'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_sales' => 'required',
            'nama_sales' => 'required',
            'telp' => 'required',
            'area' => 'required',
        ]);
        $salesd = Salesd::find($id);
        $salesd->id_sales = $request->id_sales;
        $salesd->nama_sales = $request->nama_sales;
        $salesd->telp = $request->telp;
        $salesd->area = $request->area;
        $salesd->save();
        return redirect()->route('salesd.index')->with('success','Data Sales Telah Berhasil Diubah');
    }

    public function destroy(Salesd $salesd)
    {
        $salesd->delete();
        return redirect()->route('salesd.index')->with('success','Data Sales Telah Berhasil Dihapus');
    }
}
