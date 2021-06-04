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
        "nik",
        "ktp",
        "alamat_toko",
    ];

    protected $hidden = [
        'nik',
        'ktp',
    ];

    public static function popular($i){
        $tokos = Toko::withCount(['produks', 'blogs'])->orderBy('produks_count', 'desc')->take($i)->get();
        return $tokos;
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user')->withDefault(
            MissingUser::make(['id' => $this->id_user]));
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
    public function delete()
    {
        // delete all related photos
        $this->blogs()->delete();
        $this->pembayaran()->delete();
        $this->produks()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    public static function findOrMissing($id)
    {
        return self::find($id) ?? MissingToko::make();
    }
}
