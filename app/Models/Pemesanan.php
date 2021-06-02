<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_produk',
        'id_user',
        'id_toko',
        'ekspedisi',
        'kuantitas',
        'total_harga',
        'bukti_pembayaran',
        'batas_pembayaran',
        'alamat_pengiriman',
        'tanggal_pembayaran',
        'status'
    ];

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko');
    }
    public function resi(){
        return $this->hasOne(Resi::class, 'id_pemesanan');
    }
}
