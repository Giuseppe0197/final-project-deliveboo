<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function getRestaurantDishes($id) {

        $restaurant = Restaurant::findOrFail($id);

        $dishes = Dish::all()->where('restaurant_id', $id);

        return view('pages.dishList', compact('dishes'));
    }

    public function hide($id) {

        $dish = Dish::findOrFail($id);

        if ($dish['availability'] == 0) {
            $dish['availability'] = 1;
        } else {
            $dish['availability'] = 0;
        }

        $dish->update();

        return redirect()->route('dishes.list', $dish['restaurant_id']);
    }
}
