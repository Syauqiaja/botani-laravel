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

    public function pembayaran(){
        return $this->hasMany(Pembayaran::class, 'id_toko');
    }

    public function blogs(){
        return $this->hasMany(Blog::class, 'id_toko');
    }
    public function produks(){
        return $this->hasMany(Produk::class, 'id_toko');
    }
    public function blogRating(){
        $blogRatings = 0;
        foreach($this->blogs as $blog){
            $blogRatings += $blog->ratingValue();
        }
        if($this->blogs->count() > 0)
            return number_format((float)$blogRatings/$this->blogs->count(), 2, '.', '');
        else return "N";
    }
}
