<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'total_price'=>$faker->randomFloat(2, 1, 500),
        'payment_status'=>$faker->boolean(),
        'date'=>$faker->dateTime()
    ]; 
});
