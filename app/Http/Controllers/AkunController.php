<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    //
    public function user()
    {
        $user = UserModel::all();
        $admin = AdminModel::all();
        return view('admin.akun.index', compact('user', 'admin'));
    }
    public function formUser()
    {
        return view('admin.akun.user.tambah');
    }
    public function modifUser($id)
    {
        $akun = UserModel::find($id);
        return view('admin.akun.user.edit', compact('akun'));
    }
    public function tambahUser(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'no_induk' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $tambah = UserModel::create($data);

        if ($tambah) {
            return redirect()->route('akun.user')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('akun.user')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    public function editUser(Request $request,$id)
    {
        $data = $request->validate([
            'username' => 'required',
            'no_induk' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $edit = UserModel::where('id_user',$id)->update($data);

        if ($edit) {
            return redirect()->route('akun.user')->with('success', 'Data Berhasil Di Perbarui');
        } else {
            return redirect()->route('akun.user')->with('error', 'Data Gagal Di Perbarui');
        }
    }

    public function hapus($id){
        
        $hapus = UserModel::where('id_user',$id)->delete();
        if ($hapus) {
            return redirect()->route('akun.user')->with('success', 'Data Berhasil Di Hapus');
        }else{
            return redirect()->route('akun.user')->with('error', 'Data Gagal Di Hapus');
        }
    }
}
