<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "id_produk" => "required",
            "id_user" => "required",
            "id_toko" => "required",
            "jumlah_barang" => "required",
            "harga" => "required",
        ]);
        $trialExpires = Carbon::now()->addDays(30);
        $pesanan = new Pemesanan;
        $pesanan->id_produk = $request->id_produk;
        $pesanan->id_toko = $request->id_toko;
        $pesanan->kuantitas = $request->jumlah_barang;
        $pesanan->total_harga = $request->harga * $request->jumlah_barang;
        $pesanan->tanggal_pemesanan = Carbon::now();
        $pesanan->batas_pembayaran = $trialExpires;
        $pesanan->user()->associate(Auth::user());
        $pesanan->save();

        return redirect()->route('pemesanan.edit', $pesanan->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        return view('User.create-pemesanan', ["pemesanan" => $pemesanan])->with('pesan', "Mohon lengkapi pemesanan agar bisa segera diproses");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'bukti' => "image|max:3000",
            'alamat' => 'required',
            'ekspedisi' => 'required',
        ]);

        if($request->hasFile('bukti')){
            $ext = $request->bukti->getClientOriginalExtension();
            $nama = md5($request->bukti->getClientOriginalName().time()).'.'.$ext;
            $path = $request->bukti->move('images\bukti',$nama);
            $pemesanan->bukti_pembayaran = $path;
        }
        $pemesanan->alamat_pengiriman = $request->alamat;
        $pemesanan->ekspedisi = $request->ekspedisi;
        $pemesanan->tanggal_pembayaran = Carbon::now();
        $pemesanan->save();

        return redirect()->route('home')->with('pesan', 'Pemesanan berhasil dibuat, mohon tunggu untuk penjual memproses pesanan anda. Terima kasih :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
