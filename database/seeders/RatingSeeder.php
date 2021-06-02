<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
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
            $blog = Blog::find(rand(1,38));
            $user = User::find(rand(1,52));

            if(!$blog->isRated($user))
            DB::table('ratings')->insert([
                "rating" => rand(1,5),
                "id_user" => $user->id,
                "ratable_id" => $blog->id,
                "ratable_type" => "App\Models\Blog",
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
