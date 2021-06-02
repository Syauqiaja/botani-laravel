<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
          DB::table('users')->insert([
              'nama' => $faker->name,
              'email' => $faker->name.rand(0, 1000).'@gmail.com',
              'jenis_kelamin' => $kelamin[rand(0,1)],
              'password' => $faker->hash,
              'telepon' => substr($faker->phoneNumber, 0, 30),
              'quote' => $faker->text($maxNbChars = 100),
              'alamat' => $faker->address,
              'role' => rand(1,3),
              'foto_profil' => asset('images/profiles/'.$profil[rand(0,1)].rand(1,10).'.png'),
              'updated_at' => now(),
              'created_at' => now(),
          ]);
      }
    }
}
