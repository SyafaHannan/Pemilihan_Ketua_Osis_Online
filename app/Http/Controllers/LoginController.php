<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('');
    }

    public function login(Request $request)
    {
        $dataLogin = $request->validate([
            'nomor_identitas_unik' => 'required',
            'tanggal_lahir' => 'required',
            'role' => 'required'
        ]);
        if (Auth::attempt($dataLogin)) {
            $request->session()->regenerate();
            if (Auth::user()->nomor_identitas_unik && Auth::user()->role == 'Admin') {
                return redirect()->route('admin')->with('success','Login Berhasil');
            } elseif (Auth::user()->nomor_identitas_unik && Auth::user()->role != 'Admin') {
                return redirect()->route('user')->with('success','Login Berhasil');
            }else{
                return redirect()->route('login')->with('error','Login Gagal');
            }
        }else{
            return redirect()->route('login')->with('error','Login Gagal');
        }
    }
}
