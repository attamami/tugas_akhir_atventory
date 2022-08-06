<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $coutlet = DB::table('outlets')->count();
        $outlet = DB::table('outlets')->get();
        $barang = DB::table('barangs')->get();
        // $piutang = DB::table('piutangs')->get();
        $piutang = DB::table('piutangs')
            ->leftJoin('outlets', 'piutangs.id_outlet', '=', 'outlets.id_outlet')
            ->get();
        return view('home', compact('outlet','barang','piutang','coutlet'));
    }
}
