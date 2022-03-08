<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\User;
use App\Client;

use Illuminate\Http\Request;


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

        return view('pages.checkout');
    }

    public function storeClientInfo(Request $request) {

        $data = $request->validate([
            'name'=> 'required|string|max:60',
            'lastname'=> 'required|string|max:60',
            'address'=> 'required|string',
            'email'=> 'required|email|unique',
            'phone'=> 'required|string|max:20|unique',
        ]);

        $client = Client::create($data);
    }
    
    public function orderStats() {

        return view('pages.orderStatitics');
    }
}
