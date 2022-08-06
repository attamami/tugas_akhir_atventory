<?php

namespace App\Http\Controllers;

use App\Models\Leveluser;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class ManajemenUserController extends Controller
{
    public function index()
    {
        $data['manajemen_user'] = User::orderBy('id','asc')->paginate();
        return view('manajemen_user.index', $data);
    }

    public function create()
    {
        $leveluser = Leveluser::get();
        return view('manajemen_user.create', compact('leveluser'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'posisi' => 'required',
            'username' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
            
        ]);

        $hashed = bcrypt($request->password);

        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->posisi = $request->posisi;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = $hashed;
        $user->save();
        return redirect()->route('manajemen_user.index')->with('success','Data User Telah Berhasil Ditambahkan.');
    }

    // public function show(Barang $barang)
    // {
    //     return view('barang.detail',compact('barang'));
    // }

    public function edit(User $user)
    {
        $leveluser = Leveluser::get();
        return view('manajemen_user.edit',compact('manajemen_user','leveluser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'posisi' => 'required',
            'username' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);
        $hashed = bcrypt($request->password);
        $user = User::find($id);
        $user->nama_lengkap = $request->nama_lengkap;
        $user->posisi = $request->posisi;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = $hashed;
        $user->save();
        return redirect()->route('manajemen_user.index')->with('success','Data User Telah Berhasil Diubah');
    }

    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('manajemen_user.index')->with('success','Data User Telah Berhasil Dihapus');
    }
}
