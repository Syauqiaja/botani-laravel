<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $jenis = ['Tanaman', 'Peralatan'];
        for($i = 1; $i <= 50; $i++){
            $produk = DB::table('produks')->insertGetId([
            'nama_produk' => $faker->sentence($nbWords = 3, true),
            'jenis_produk' => $jenis[rand(0,1)],
            'id_toko' => rand(1,18),
            'harga_produk' => rand(1, 100)*1000,
            'deskripsi_produk' => $faker->text($maxNbChars = 200),
            'stok' => rand(1,50),
            'updated_at' => now(),
            'created_at' => now(),
            ]);
            DB::table('fotos')->insert([
            'id_produk' => $produk,
            'path' => asset('images/profiles/preview.png'),
            'updated_at' => now(),
            'created_at' => now(),
            ]);
        }
    }
}
