<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesd;
use Illuminate\Support\Facades\DB;

class SalesdController extends Controller
{
    public function index()
    {
        $data['salesd'] = Salesd::orderBy('id','asc')->get();
        return view('salesd.index', $data);
    }

    public function create()
    {
        $q = Salesd::select(DB::raw('MAX(RIGHT(id_sales,3)) as kode'));
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
        return view('salesd.create', compact('kd'));
        
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
