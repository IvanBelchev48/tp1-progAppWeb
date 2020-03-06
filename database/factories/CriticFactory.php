<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actor;
use Faker\Generator as Faker;

$factory->define(\App\Critic::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'film_id' => $faker->randomNumber(),
        'score' => $faker->randomNumber(),
        'comment' => $faker->sentence,
    ];
});
