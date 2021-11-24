<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Families;
use Faker\Generator as Faker;

$factory->define(Families::class, function (Faker $faker) {
    return [
        'name' => $faker -> name,
        'profit_margin' => $faker -> numberBetween(5,10),
        'deleted' => 0,
    ];
});
