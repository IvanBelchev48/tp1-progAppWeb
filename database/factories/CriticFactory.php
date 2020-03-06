<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actor;
use Faker\Generator as Faker;

$factory->define(\App\Critic::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'film_id' => 1,
        'score' => 10,
        'comment' => $faker->sentence,
    ];
});
