<?php
namespace App\Models;

class MissingToko extends Toko{
    protected static $unguarded = true;

    protected $attributes = [
        "id_user" => 0,
        "nama_toko" => '--missing toko--',
        "informasi_toko" => '--missing toko--',
        "nik" => '--missing toko--',
        "ktp" => '--missing toko--',
        "alamat_toko" => '--missing toko--',
    ];
}
