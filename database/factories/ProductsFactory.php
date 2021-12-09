<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'article_id' => \App\Articles::all()->random()->id,
        'company_id' => \App\Companies::all()->random()->id,
        'price' => $faker -> numberBetween(15,20),
        'stock' => $faker -> numberBetween(5,10),
        'family_id' => \App\Families::all()->random()->id,
        'deleted' => 0,
    ];
});
