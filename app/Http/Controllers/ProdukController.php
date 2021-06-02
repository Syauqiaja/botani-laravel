<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produk.create');
    }
    public function edit(){
        return view('Produk.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Produk;
        $request->validate([
            "nama" => "required",
            "harga" => "required|digits_between:1,30",
            "stok" => "required|digits_between:1,10",
            "tipe" => "required|not_in:0",
            "files.*" => "image|max:3000",
        ]);
        $produk->nama_produk = $request['nama'];
        $produk->harga_produk = $request['harga'];
        $produk->stok = $request['stok'];
        $produk->jenis_produk = $request['tipe'];
        $produk->deskripsi_produk = $request['deskripsi'];
        $produk->id_toko = Auth::user()->toko->id;
        $produk->save();

        if($request->hasFile('files')){
            $files = $request->file('files');
            foreach($files as $file){
                $ext = $file->getClientOriginalExtension();
                $nama = md5($file->getClientOriginalName().time()).'.'.$ext;
                $path = $file->move('images\produks',$nama);
                $fotos = new Foto;
                $fotos->id_produk = $produk->id;
                $fotos->path = $path;
                $produk->fotos()->save($fotos);
            }
        }
        $produk->save();
        return redirect()->route('produk.show', $produk->id)->with('pesan', "Produk berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        $fotos = $produk->fotos;
        return view('Produk.show')->with('produk', $produk)->with('fotos', $fotos);
    }

    public function search(Request $request){
        if($request->category != ""){
            $produks = Produk::where('jenis_produk', '=', $request->category)
                            ->where('nama_produk', 'like', "%".$request->search."%")
                            ->get();
        }else{
            $produks = Produk::where('nama_produk', 'like', "%".$request->search."%")
                            ->get();
        }
        // dump($produks);
        // die;
        // foreach($produks as $produk){
        //     dump($produk->toko);
        // }
        // die;
        return view('Produk.search', ["produks" => $produks]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
