<?php


use Illuminate\Database\Seeder;
use App\Client;
use App\Order;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 30)->make()->each(function ($client) {

            $order = Order::inRandomOrder()->limit(1)->get();    

            $client->order()->associate($order);
            $client->save();
        });
    }
}
