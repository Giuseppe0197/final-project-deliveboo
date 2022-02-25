<?php

use App\Client;
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
        // factory(Order::class, 30)->make()->each(function ($order) {

        //     $client = Client::inRandomOrder()->limit(1)->first();
        //     $order->client()->associate($client);

        //     $order->save();
        // });
    }
}
