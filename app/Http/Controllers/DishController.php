<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function getRestaurantDishes($id) {

        $restaurant = Restaurant::findOrFail($id);

        $dishes = Dish::all();

        return view('pages.dishList', compact('dishes'));
    }

    public function hide($id) {


    }
}
