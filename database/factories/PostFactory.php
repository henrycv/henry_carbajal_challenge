<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'title' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'content' => $faker->realText($maxNbChars = 1500, $indexSize = 2),
        'active' => true,
    ];
});
