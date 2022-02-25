<?php

use App\Category;
use App\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Restaurant::class, 15)->create()->each(function ($restaurant) {

            $category = Category::inRandomOrder()->limit(rand(1, 5))->get();
            $restaurant->categories()->attach($category);

            $restaurant->save();
        });
    }
}
