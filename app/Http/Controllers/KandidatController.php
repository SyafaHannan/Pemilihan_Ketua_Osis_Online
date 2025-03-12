<?php

namespace App\Http\Controllers;

use App\Models\KandidatModel;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function index()
    {
        $kandidats = KandidatModel::all();
        return view('admin.kandidat.index', compact('kandidats'));
    }

    public function tambahKandidat()
    {
        return view('admin.kandidat.tambah');
    }

    public function simpanKandidat(Request $request)
    {
        $request->validate([
            'calon_ketua' => 'required',
            'calon_wakil_ketua' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'required|image|file',
        ]);

        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('uploads'), $fileName);

        KandidatModel::create([
            'calon_ketua' => $request->calon_ketua,
            'calon_wakil_ketua' => $request->calon_wakil_ketua,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'foto' => 'uploads/' . $fileName
        ]);

        return redirect()->route('kandidat.index')->with('success', 'Data kandidat berhasil ditambahkan');
    }

    public function editKandidat($id_kandidat)
    {
        $kandidat = KandidatModel::findOrFail($id_kandidat);
        return view('admin.kandidat.edit', compact('kandidat'));
    }

    public function updateKandidat(Request $request, $id_kandidat)
    {
        $request->validate([
            'calon_ketua' => 'required',
            'calon_wakil_ketua' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'image|file',
        ]);

        $kandidat = KandidatModel::findOrFail($id_kandidat);

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $kandidat->foto = 'uploads/' . $fileName;
        }

        $kandidat->update([
            'calon_ketua' => $request->calon_ketua,
            'calon_wakil_ketua' => $request->calon_wakil_ketua,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('kandidat.index')->with('success', 'Data kandidat berhasil diperbarui');
    }

    public function hapusKandidat($id_kandidat)
    {
        $kandidat = KandidatModel::findOrFail($id_kandidat);
        if (file_exists(public_path($kandidat->foto))) {
            unlink(public_path($kandidat->foto));
        }
        $kandidat->delete();
        return redirect()->route('kandidat.index')->with('success', 'Data kandidat berhasil dihapus');
    }
}
