<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    use HasFactory;

    protected $fillable = [
        "kode_resi",
        "path",
        "id_toko",
        "id_pemesanan",
    ];

    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko')->withDefault(
            MissingToko::make(['id' => $this->id_toko]));
    }

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}
