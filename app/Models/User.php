<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function blog() {

        return $this->hasMany(Blog::class, 'id_user');

    }
    public function toko() {
            return $this->hasOne(Toko::class, 'id_user');
    }
    public function ratings(){
        return $this->hasMany(Rating::class, 'id_user');
    }
    public function delete()
    {
        // delete all related photos
        $this->toko()->delete();
        $this->ratings()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'telepon',
        'role',
        'foto_profil',
        'jenis_kelamin',
        'quote',
        'alamat',
    ];

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
        return self::find($id) ?? MissingUser::make();
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
