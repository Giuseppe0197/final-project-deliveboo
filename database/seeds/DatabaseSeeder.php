<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            RestaurantSeeder::class,
            CategorySeeder::class,
            DishSeeder::class,
            OrderSeeder::class,
            ClientSeeder::class,

        ]);
    }
}
