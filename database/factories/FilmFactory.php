<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'release_year' => 2001,
        'length' => 100,
        'description' => $faker->paragraph,
        'rating' => 'G',
        'language_id' => 1,
        'special_features' => $faker->text,
        'image' => $faker->text,
    ];
});
