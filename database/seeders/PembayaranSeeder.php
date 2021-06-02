<?php

namespace Database\Seeders;

use App\Models\Toko;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $metode = ["BRI","BCA","BNI","Mandiri"];
        for($i = 1; $i <= 50; $i++){

            $kuantitas = rand(1,30);
            $toko = Toko::find(rand(1, 20));
            if($toko != null)
            DB::table('pembayarans')->insert([
                'id_user' => $toko->user->id,
                'id_toko' => $toko->id,
                'metode' => $metode[rand(0,3)],
                'kode_identitas' => $faker->bankAccountNumber,
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
