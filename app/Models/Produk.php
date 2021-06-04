<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'jenis_produk',
        'id_toko',
        'harga_produk',
        'deskripsi_produk',
        'stok',
    ];

    public function fotos(){
        return $this->hasMany(Foto::class, 'id_produk', 'id');
    }

    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko')->withDefault(
            MissingToko::make(['id' => $this->id_toko]));
    }

    public function ratings(){
        return $this->morphMany(Rating::class, 'ratable');
    }
    public static function latestProduk($i){
        $produks = Produk::orderBy('created_at', 'desc')->take($i)->get();
        return $produks;
    }
    public function delete()
    {
        // delete all related photos
        $this->fotos()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    public static function findOrMissing($id)
    {
        return self::find($id) ?? MissingProduk::make();
    }
}
