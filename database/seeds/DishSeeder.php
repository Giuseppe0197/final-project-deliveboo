<?php

use App\Dish;
use App\Restaurant;
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
        factory(Dish::class, 50)->create()->each(function ($dish) {

            $category = Restaurant::inRandomOrder()->limit(rand(1, 5))->get();
            $dish->categories()->attach($category);

            $dish->save();
        });
    }
}
