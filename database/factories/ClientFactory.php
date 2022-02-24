<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName(), 
        'lastname'=>$faker->lastName(),
        'address'=>$faker->address(),
        'email'=>$faker->unique()->email(),
        'phone'=>$faker->unique()->PhoneNumber()
    ];
});
