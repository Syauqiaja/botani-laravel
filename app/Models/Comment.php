<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'isi_comment',
        'id_parent',
        'commentable_id',
        'commentable_type',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'id_parent');
    }

    public function parent(){
        return $this->belongsTo(Comment::class, 'id_parent');
    }

    public function commentable(){
        return $this->morphTo();
    }
}
