<?php

use App\Category;
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
        factory(Category::class, 14)->create();
    }
}
