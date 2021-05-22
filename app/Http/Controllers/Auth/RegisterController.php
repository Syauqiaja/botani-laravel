<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telepon' => ['digits_between:10,15'],
            'jenis_kelamin' => ['required'],
            'foto_profil' => ['image', 'max:2000'],
            'avatar' => ['required_without:foto_profil'],
            'quote' => ['string', 'max:255']
        ],[
            "required" => "Field :attribute harus diisi.",
            "email" => "Field :attribute bukan berupa valid email.",
            "max"=> array(
                "numeric" => "Field :attribute tidak boleh lebih dari :max.",
                "file" => "Field :attribute tidak boleh lebih dari :max KB.",
                "string" => "Field :attribute tidak boleh lebih dari :max karakter.",
                "array" => "Field :attribute tidak boleh lebih dari :max items.",
            ),
            "min"=> array(
                "numeric" => "Field :attribute tidak boleh kurang dari :min.",
                "file" => "Field :attribute tidak boleh kurang dari :min KB.",
                "string" => "Field :attribute tidak boleh kurang dari :min karakter.",
                "array" => "Field :attribute tidak boleh kurang dari :min items.",
            ),
            "digits_between" => "Field :attribute harus di antara :min and :max digit.",
            "image" => "Field :attribute harus berupa gambar.",
            "required_without" => "Field :attribute harus diisi ketika :values tidak ada.",
            "confirmed" => "Field :attribute konfirmasi tidak cocok.",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $path = "";
        if(array_key_exists('useavatar', $data)){
            $path = 'images/profiles/'.$data['avatar'].'.'.'png';
        }else{
            $ext = $data['foto_profil']->getClientOriginalExtension();
            $nama = $data['nama'].rand(99,999).time().'.'.$ext;
            $path = $data['foto_profil']->move('images\profiles',$nama);
        }
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telepon' => $data['telepon'],
            'role' => $data['role'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'quote' => $data['quote'],
            'foto_profil' => $path,
            'alamat' => $data['alamat']
        ]);
    }
}
