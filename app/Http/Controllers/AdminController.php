<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function tambahKandidat(Request $request){
        $data = [
            'calon_ketua' => $request->calon_ketua,
            'calon_wakil_ketua' => $request->calon_wakil_ketua,
            'visi' =>  $request->visi,
            'misi' => $request->misi
        ];
    }

    public function formAdmin()
    {
        return view('admin.akun.admin.tambah');
    }
    public function modifAdmin($id)
    {
        $akun = AdminModel::find($id);
        return view('admin.akun.admin.edit', compact('akun'));
    }
    public function tambahAdmin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $data ['password'] = Hash::make($data['password']);

        $tambah = AdminModel::create($data);

        if ($tambah) {
            return redirect()->route('akun.user')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('akun.user')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    public function editAdmin(Request $request,$id)
    {
        $data = $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password' => 'nullable',
            'role' => 'required'
        ]);
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $edit = AdminModel::where('id_admin',$id)->update($data);

        if ($edit) {
            return redirect()->route('akun.user')->with('success', 'Data Berhasil Di Perbarui');
        } else {
            return redirect()->route('akun.user')->with('error', 'Data Gagal Di Perbarui');
        }
        return view('admin.akun.admin.edit');
    }

    public function hapus($id){
        
        $hapus = AdminModel::where('id_admin',$id)->delete();
        if ($hapus) {
            return redirect()->route('akun.user')->with('success', 'Data Berhasil Di Hapus');
        }else{
            return redirect()->route('akun.user')->with('error', 'Data Gagal Di Hapus');
        }
    }
}

