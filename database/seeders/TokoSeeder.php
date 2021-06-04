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
        $usercount = User::count();

        for($i = 1; $i <= $usercount; $i++){
        $user = User::findOrMissing($i);
        if($user->role == 2 && $user->toko == null){
          DB::table('tokos')->insert([
            "id_user" => $user->id,
            "nama_toko" => $faker->company,
            "informasi_toko" => $faker->text($maxNbChars = 200) ,
            "alamat_toko" => $faker->address,
            "nik" => "2314652468972135",
            "ktp" => asset('images/profiles/preview.png'),
            'updated_at' => now(),
            'created_at' => now(),
          ]);
          }
      }
    }
}
