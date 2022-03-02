<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 15)->create()->each(function ($user) {

            $category = Category::inRandomOrder()->limit(rand(1, 5))->get();
            $user->categories()->attach($category);

            $user->save();
        });
    }
}
