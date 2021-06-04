<?php
namespace App\Models;

class MissingProduk extends Produk{
    protected static $unguarded = true;

    protected $attributes = [
        'nama_produk' => '--missing produk--',
        'jenis_produk' => '--missing produk--',
        'id_toko' => 0,
        'harga_produk' => '--missing produk--',
        'deskripsi_produk' => '--missing produk--',
        'stok' => 0,
    ];
}
