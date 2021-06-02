<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Toko;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(){
        return view('Toko.profile-shop');
    }
    public function dashboard(){
        return view('Toko.dashboard-shop');
    }
    public function register(){
        return view('Toko.create');
    }
    public function manageProduk()
    {
        $toko = Auth::user()->toko;
        if($toko != null) return view('Toko.manage.produk', ['produks'=>$toko->produks]);
        else return view('Toko.create');
    }
    public function manageBlog(){
        $blogs = Blog::where('id_toko', Auth::user()->toko['id'])->withCount(['comments', 'ratings'])->get();
        if(Auth::user()->toko != null) return view('Toko.manage.blog', ['blogs'=>$blogs]);
        else return view('Toko.create');
    }
    public function managePesanan(){
        $pemesanans = Pemesanan::where('id_toko', Auth::user()->toko['id'])->get();
        if(Auth::user()->toko != null) return view('Toko.manage.pemesanan', ['pemesanans'=>$pemesanans]);
        else return view('Toko.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|max:255",
            "info" => "required",
            "alamat" => "required",
            "kode_identitas" => "required",
            "pembayaran" => "required",
        ]);
        $toko = new Toko;

        $toko->user()->associate(Auth::user());
        $toko->nama_toko = $request->nama;
        $toko->informasi_toko = $request->info;
        $toko->alamat_toko = $request->alamat;
        $toko->save();

        $pembayaran = new Pembayaran;
        $pembayaran->metode = $request->pembayaran;
        $pembayaran->kode_identitas = $request->kode_identitas;
        $pembayaran->toko()->associate($toko);
        $pembayaran->user()->associate(Auth::user());
        $pembayaran->save();

        return redirect()->route('home')->with('pesan', 'Pembuatan toko berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        if($toko != null){
            $produks = Produk::where('id_toko', $toko->id)->get();
        // dump($produks); die;
            return view('Toko.show', ["toko"=>$toko, "produks"=>$produks]);
        }else{
            return "Toko Tidak Ditemukan";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        //
    }
}
