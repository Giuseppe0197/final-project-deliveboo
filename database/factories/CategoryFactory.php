<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->randomElement(['Italiano', 'Giapponese', 'Cinese', 'Vegetariano', 'Thailandese', 'Spagnolo', 'Americano', 'Messicano', 'Greco', 'Indiano', 'Pizza', 'Pesce', 'Carne', 'Fast-food'])
    ];
});
