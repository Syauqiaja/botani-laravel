<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Resi;
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
    public function bayar(Pemesanan $pemesanan)
    {
        return view('Toko.bayar', ["pemesanan" => $pemesanan]);
    }

    public function bayarStore(Request $request, Pemesanan $pemesanan){
        $request->validate([
            "bukti" => "required|image|max:3000"
        ]);

        if($request->hasFile('bukti')){
            $ext = $request->bukti->getClientOriginalExtension();
            $nama = md5($pemesanan->id.time()).'.'.$ext;
            $path = $request->bukti->move('images\bukti',$nama);

            $pemesanan->bukti_pembayaran = $path;
            $pemesanan->status = 1;
            $pemesanan->tanggal_pembayaran = now();
            $pemesanan->save();
        }

        return redirect()->route('home')->with('pesan', "Pembayaran berhasil, silahkan tunggu pesananmu diproses. Jika dalam jangka waktu 4 hari status pesanan belum 'dikirim', maka silahkan melapor pada kami :)");
    }

    public function show(Pemesanan $pemesanan){
        $start = Carbon::parse($pemesanan->tanggal_pembayaran);
        $start = $start->addDay(4);

        $sisaWaktu = now()->diffInDays($start, false);
        return view('Toko.show-pesanan', ["pemesanan" => $pemesanan, 'sisaWaktu' => $sisaWaktu]);
    }

    public function kirim(Request $request,Pemesanan $pemesanan){
        $request->validate([
            "resi" => "required",
            "fileResi" => "required|image",
        ]);

        if($request->hasFile('fileResi')){
            $ext = $request->fileResi->getClientOriginalExtension();
            $nama = md5($request->fileResi->getClientOriginalName().time()).'.'.$ext;
            $path = $request->fileResi->move('images\resi',$nama);

            $resi = new Resi;
            $resi->path = $path;
            $resi->kode_resi = $request->resi;
            $resi->id_pemesanan = $pemesanan->id;
            $resi->id_toko = $pemesanan->toko['id'];
            $pemesanan->resi()->save($resi);
        }
        $pemesanan->status = 2;
        $pemesanan->save();

        return redirect()->route('toko.manage.pesanan');
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

        $pemesanan->alamat_pengiriman = $request->alamat;
        $pemesanan->ekspedisi = $request->ekspedisi;
        $pemesanan->tanggal_pembayaran = Carbon::now();
        $pemesanan->save();

        return redirect()->route('home')
                        ->with('pesan', "Pemesanan berhasil dibuat, silahkan lihat pesanan di 'Riwayat Pembelian' untuk melakukan pembayaran")
                        ->with('id_pemesanan', $pemesanan->id);
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
