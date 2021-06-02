<?php

namespace Database\Seeders;

use App\Models\Toko;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $fotos = [
            asset('images/produks/ee1faf58a95d4bec95deabfd87d9b8a3.jpg'),
            asset('images/blogs/6c5c1409b459ed18bd1d11b98c271691.jpg'),
            asset('images/blogs/6f756ff26fe0c962ea34079837d79469.jpeg'),
            asset('images/blogs/49dca9cdba17e09e2bf9b74eb8ee6f89.jpg'),
            asset('images/produks/bc300e83edcb3ba0895cf4ad76bba60d.jpeg'),
            asset('images/produks/aaea353f072b0ae90ed5ead35e72c6e8.jpeg'),
        ];
        for($i = 1; $i <= 50; $i++){
            $toko = Toko::find(rand(1, 20));
            if($toko != null)
            DB::table('blogs')->insert([
                'nama_blog' => $faker->sentence(4,true),
                'isi_blog' => $faker->text(200),
                'video' => null,
                'foto' => $fotos[rand(0,5)],
                'id_toko' => $toko->id,
                'id_user' => $toko->id_user,
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
