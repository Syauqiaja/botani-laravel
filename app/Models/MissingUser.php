<?php
namespace App\Models;

class MissingUser extends User{
    protected static $unguarded = true;

    protected $attributes = [
        'nama' => "--missing user--",
        'email' => '--missing user--',
        'telepon' => '--missing user--',
        'role' => 0,
        'foto_profil' => 'images/profiles/preview.png',
        'jenis_kelamin' => '--missing user--',
        'quote' => '--missing user--',
        'alamat' => '--missing user--',
    ];
}
