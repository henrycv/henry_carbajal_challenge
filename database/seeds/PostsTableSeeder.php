<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Post::create([
                'user_id' => $faker->randomDigitNotNull,
                'title' => $faker->sentence,
                'content' => $faker->realText($maxNbChars = 1500, $indexSize = 2),
                'active' => true,
            ]);
        }
    }
}
