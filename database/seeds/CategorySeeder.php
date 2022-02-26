<?php

use App\Category;
use App\Restaurant;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 6)->create();
    }
}
