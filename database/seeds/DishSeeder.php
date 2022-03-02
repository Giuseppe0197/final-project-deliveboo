<?php

use App\Dish;
use App\User;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dish::class, 100)->make()->each(function ($dish) {

            $user = User::inRandomOrder()->limit(1)->first();
            $dish->user()->associate($user);

            $dish->save();
        });
    }
}
