<?php

namespace App\Http\Controllers;

use App\Models\ForumModel;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    //
    public function index(){
        $forum = ForumModel::all();
        return view('admin.forum.index', compact('forum'));
    }

    public function formForum()
    {
        return view('admin.forum.tambah');
    }
    public function modifForum($id)
    {
        $forum = ForumModel::find($id);
        return view('admin.forum.edit', compact('forum'));
    }

    public function tambahForum(Request $request){
        $data = $request->validate([
            'judul' => 'required',
            'akses' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $tambah = ForumModel::create($data);

        if ($tambah) {
            return redirect()->route('forum.pemilihan')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('forum.pemilihan')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    public function editForum(Request $request,$id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'akses' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        $edit = ForumModel::where('id_forum',$id)->update($data);

        if ($edit) {
            return redirect()->route('forum.pemilihan')->with('success', 'Data Berhasil Di Perbarui');
        } else {
            return redirect()->route('forum.pemilihan')->with('error', 'Data Gagal Di Perbarui');
        }
        return view('admin.forum.edit');
    }

    public function hapusForum($id){

        $hapus = ForumModel::where('id_forum',$id)->delete();
        if ($hapus) {
            return redirect()->route('forum.pemilihan')->with('success', 'Data Berhasil Di Hapus');
        }else{
            return redirect()->route('forum.pemilihan')->with('error', 'Data Gagal Di Hapus');
        }
    }
}
