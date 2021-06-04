<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        "rating",
        "id_user",
        "ratable_id",
        "ratable_type",
    ];

    public function ratable(){
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user')->withDefault(
            MissingUser::make(['id' => $this->id_user]));
    }
}
