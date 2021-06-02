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
        for($i = 1; $i <= 50; $i++){
            $toko = Toko::find(rand(1, 20));
            if($toko != null)
            DB::table('blogs')->insert([
                'nama_blog' => $faker->sentence(4,true),
                'isi_blog' => $faker->text(200),
                'video' => null,
                'foto' => asset('images/produks/ee1faf58a95d4bec95deabfd87d9b8a3.jpg'),
                'id_toko' => $toko->id,
                'id_user' => $toko->id_user,
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
