<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function manageUser(){
        if(Auth::user()->role == 3){
        $users = User::all();
        return view('Admin.manage-user', ['users'=>$users]);
        }
    }

    public function manageBlog(){
        $blogs = Blog::withCount(['ratings', 'comments'])->get();
        // dump($blogs); die;
        return view('Admin.manage-blog', ['blogs' => $blogs]);
    }

    public function manageProduk(){
        $produks = Produk::all();
        return view('Admin.manage-produk', ["produks" => $produks]);
    }
}
