<?php

namespace Database\Seeders;

use App\Models\Toko;
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
        $fotos = [
            asset('images/produks/ee1faf58a95d4bec95deabfd87d9b8a3.jpg'),
            asset('images/blogs/6c5c1409b459ed18bd1d11b98c271691.jpg'),
            asset('images/blogs/6f756ff26fe0c962ea34079837d79469.jpeg'),
            asset('images/blogs/49dca9cdba17e09e2bf9b74eb8ee6f89.jpg'),
            asset('images/produks/bc300e83edcb3ba0895cf4ad76bba60d.jpeg'),
            asset('images/produks/aaea353f072b0ae90ed5ead35e72c6e8.jpeg'),
        ];
        $tcount = Toko::count();
        for($i = 1; $i <= 50; $i++){
            $produk = DB::table('produks')->insertGetId([
            'nama_produk' => $faker->sentence($nbWords = 3, true),
            'jenis_produk' => $jenis[rand(0,1)],
            'id_toko' => rand(1, $tcount),
            'harga_produk' => rand(1, 100)*1000,
            'deskripsi_produk' => $faker->text($maxNbChars = 200),
            'stok' => rand(1,50),
            'updated_at' => now(),
            'created_at' => now(),
            ]);
            DB::table('fotos')->insert([
            'id_produk' => $produk,
            'path' => $fotos[rand(0,5)],
            'updated_at' => now(),
            'created_at' => now(),
            ]);
        }
    }
}
