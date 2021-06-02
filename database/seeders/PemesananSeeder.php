<?php

namespace Database\Seeders;

use App\Models\Produk;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        $ekspedisi = ["Pos Indonesia","JNE","Ninja Express","SICEPAT"];
        for($i = 1; $i <= 50; $i++){
            $produk = Produk::find(rand(1,50));
            $kuantitas = rand(1,30);
            DB::table('pemesanans')->insert([
                'id_produk' => $produk->id,
                'id_user' => 51,
                'id_toko' => $produk->toko->id,
                'ekspedisi' => $ekspedisi[rand(0,3)],
                'kuantitas' => $kuantitas,
                'total_harga' => $kuantitas * $produk->harga_produk,
                'batas_pembayaran' => now()->addDays(7),
                'alamat_pengiriman' => $faker->address,
                'status' => rand(0, 4),
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
