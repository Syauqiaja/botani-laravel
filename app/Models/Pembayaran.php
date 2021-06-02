<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_toko',
        'metode',
        'kode_identitas'
    ];

    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
