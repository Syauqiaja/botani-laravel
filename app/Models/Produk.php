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
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function ratings(){
        return $this->morphMany(Rating::class, 'ratable');
    }
}
