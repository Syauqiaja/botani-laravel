<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_user",
        "nama_toko",
        "informasi_toko",
        "alamat_toko",
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
