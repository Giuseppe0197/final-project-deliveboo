<?php

use App\Dish;
use App\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 30)->create()->each(function ($order) {

            $dishes = Dish::inRandomOrder()->limit(rand(1, 5))->get();
            $order->dishes()->attach($dishes);

            $order->save();
        });
    }
}
