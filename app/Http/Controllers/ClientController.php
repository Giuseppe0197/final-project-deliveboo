<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use Illuminate\Http\Request;

use App\User;

class ClientController extends Controller
{
    public function showRestaurant($id) {

        $restaurant = User::findOrfail($id);

        $dishes = Dish::all()->where('user_id', $id)->where('availability', '=', 1);

        $categories = Category::all();

        $categories_restaurant = $restaurant->categories()->wherePivot('user_id', $id)->get();

        return view('pages.singleRestaurant', compact('restaurant', 'dishes', 'categories_restaurant'));
    }

    public function checkout() {

        $cart = session("cart");
        $totalPrice = 0;

        foreach ($cart as $value) {
            $totalPrice += number_format($value["price"],2);
        }

        $totalPrice = number_format($totalPrice,2);

        return view('pages.checkout', compact('cart', 'totalPrice'));
    }
}
