<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    //
    public function user(){
        $user = UserModel::all();
        $admin = AdminModel::all();
        return view('admin.akun.user',compact('user','admin'));
    }
}
