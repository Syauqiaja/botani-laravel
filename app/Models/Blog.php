<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_blog',
        'isi_blog',
        'video',
        'foto',
        'id_toko',
        'rate',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function ratings(){
        return $this->morphMany(Rating::class, 'ratable');
    }

    public function rateId(){
        $rating = DB::table('ratings')->where('id_user', Auth::user()->id)->where('ratable_id', $this->id)
                        ->where('ratable_type', 'App\Models\Blog')->first('id');

        return $rating;
    }

    public function rating(){
        $id = $this->rateId();
        if($id != null){
            return Rating::find($id->id);
        }
        return null;
    }

    public function ratingValue(){
        $rating = $this->ratings->avg('rating');
        return $rating;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
