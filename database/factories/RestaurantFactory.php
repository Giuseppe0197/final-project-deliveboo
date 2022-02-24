<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'owner_name'=>$faker->name(),
        'restaurant_name'=>$faker->words(3, true),
        'restaurant_phone'=>$faker->unique()->phoneNumber(),
        'email'=>$faker->unique()->email(),
        'password'=>$faker->password(),
        'address'=>$faker->address(),
        'image'=>$faker->imageUrl(360, 360, 'food', true, 'pizza'),
        'p_iva'=>$faker->unique()->vatId()
    ];
}); 
