<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('User.show');
    }
    public function show(User $user){
        return view('User.show', ["user" => $user]);
    }
    public function edit(User $user){
        return view('User.edit', ["user"=>$user]);
    }
    public function update(Request $request, User $user){
        $validator = $request->validate([
            "nama" => "required|max:255|string",
            "telepon" => "digits_between:10,15",
            "email" => "required|email|unique:users,email,".$user->id.",id|string|max:255",
            "jenis_kelamin" => "",
            "alamat" => "",
            "foto_profil" => "image|max:2000"
        ]);
        $user->nama = $validator['nama'];
        $user->telepon = $validator['telepon'];
        $user->email = $validator['email'];
        $user->jenis_kelamin = $validator['jenis_kelamin'];
        $user->alamat = $validator['alamat'];
        if($request->useAvatar == "no" && $request->hasFile('foto_profil')){
            $ext = $request['foto_profil']->getClientOriginalExtension();
            $nama = $request['nama'].rand(99,999).time().'.'.$ext;
            $user->foto_profil = $request['foto_profil']->move('images\profiles',$nama);
        }else if($request->useAvatar == "yes" && $request['avatar'] != null){
            $user->foto_profil = 'images/profiles/'.$request['avatar'].'.'.'png';
        }
        $user->save();
        return redirect()->route('user.show', $user->id)->with('pesan', 'Selamat, perubahan berhasil !');
    }
    public function penjual(){
        $toko = DB::table('tokos')->where('id_user', '=', Auth::user())->first();
        if($toko == null){
            return redirect()->route('toko.create');
        }
        return redirect()->route('home');
    }
    public function admin(){
        return redirect()->route('home');
    }
}
