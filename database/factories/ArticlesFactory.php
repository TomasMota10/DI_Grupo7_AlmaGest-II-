<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articles;
use Faker\Generator as Faker;

$factory->define(Articles::class, function (Faker $faker) {
    return [
        'name' => $faker -> name,
        'description' => $faker -> sentence(2, false),
        'price_min' => $faker -> numberBetween(5,10),
        'price_max' => $faker -> numberBetween(15,20),
        'color_name' => 'white',
        'weight' => 2,
        'size' => '20 cm',
        'family_id' => \App\Families::all()->random()->id,
        'deleted' => 0,
    ];
});
