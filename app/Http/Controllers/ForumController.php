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
}
