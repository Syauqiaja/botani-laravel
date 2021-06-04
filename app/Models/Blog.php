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

    public static function latestBlog($i){
        $blogs = Blog::orderBy('created_at', 'desc')->take($i)->withCount(['comments', 'ratings'])->get();
        return $blogs;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withDefault(
            MissingUser::make(['id' => $this->id_user]));
    }

    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko')->withDefault(
            MissingToko::make(['id' => $this->id_toko]));
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

    public function delete()
    {
        // delete all related photos
        $this->ratings()->delete();
        $this->comments()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }

    public function isRated(User $user){
        $rating = DB::table('ratings')->where('id_user', $user->id)->where('ratable_id', $this->id)
                        ->where('ratable_type', 'App\Models\Blog')->first('id');

        if($rating != null) return true;
        else return false;
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

        return number_format((float)$rating, 2, '.', '');
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

    public static function findOrMissing($id)
    {
        return self::find($id) ?? MissingBlog::make();
    }
}
