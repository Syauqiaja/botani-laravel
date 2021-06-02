<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $kelamin = ['L', 'P'];
        $profil = ['female-', 'male-'];

        for($i = 1; $i <= 50; $i++){
        $user = User::find($i);
            if($user->role == 2){
          DB::table('tokos')->insert([
            "id_user" => $i,
            "nama_toko" => $faker->company,
            "informasi_toko" => $faker->text($maxNbChars = 200) ,
            "alamat_toko" => $faker->address,
            'updated_at' => now(),
            'created_at' => now(),
          ]);
          }
      }
    }
}
