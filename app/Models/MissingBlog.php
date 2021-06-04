<?php
namespace App\Models;

class MissingBlog extends Blog{
    protected static $unguarded = true;

    protected $attributes = [
        'nama_blog' => "--missing blog--",
        'isi_blog' => "--missing blog--",
        'foto' => 'images/profiles/preview.png',
        'id_toko' => 0,
        'rate' => 0,
        'id_user' => 0,
    ];
}
