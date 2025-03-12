<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    //
    public function user()
    {
        return view('login.user');
    }
    public function admin()
    {
        return view('login.admin');
    }

    public function logout(Request $request)
    {
        $role = $request->role;
        Auth::guard($role)->logout();
    }

    public function check(Request $request)
    {
        if ($request->role == 'admin') {
            $dataLogin = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            if (Auth::guard('admin')->attempt($dataLogin)) {
                //jika login berhasil generate session dan redirect ke  halaman dashboard
                $request->session()->regenerate();
                if (Auth::guard('admin')->user()->email) {
                    // return response(
                    //     [
                    //         'success' => true,
                    //         'redirect_url' => '/admin/',
                    //         'pesan' => 'Login Berhasil'
                    //     ],
                    //     200
                    // );
                    return redirect('/admin')->with('success', 'Login Berhasil');
                } else {
                    return back()->with('error', 'Login Gagal');
                }
            } else {
                return back()->with('error', 'Email atau Password Salah');
            }
        }
    }
    public function verif(Request $request)
    {
        $request->validate([
            'no_induk' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $user = UserModel::where('no_induk', $request->no_induk)
            ->where('tanggal_lahir', $request->tanggal_lahir)
            ->first();
        // dd($user);
        // Auth::login($user); // Proses login tanpa return
        // dd(Auth::check());


        if ($user) {
            Auth::login($user); // Proses login tanpa return
            session()->regenerate();
        if(Auth::user()->no_induk){
            return redirect()->intended('/user')->with('success', 'Login Berhasil');
        }else{
            return back()->with('error', 'Login Gagal: User tidak ditemukan');
        }
        } else {
            return back()->with('error', 'Login Gagal: User tidak ditemukan');
        }
    }
}
