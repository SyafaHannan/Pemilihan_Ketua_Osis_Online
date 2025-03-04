<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
