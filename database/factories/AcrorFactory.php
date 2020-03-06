<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actor;
use Faker\Generator as Faker;

$factory->define(Actor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->first_name,
        'last_name' => $faker->last_name,
        'birthdate' => $faker->birthdate,
    ];
});
