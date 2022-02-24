<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [
        'name'=>$faker->words(3, true),
        'description'=>$faker->text(),
        'price'=>$faker->randomFloat(2, 1, 99),
        'type'=>$faker->randomElement(['Antipasto', 'Primo', 'Secondo', 'Dolce', 'Pizze', 'Sushi', 'Bibite']),
        'image'=>$faker->imageUrl(360, 360, 'food', true, 'pizza'),
        'avilability'=>$faker->boolean()
    ];
});
