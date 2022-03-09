<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\User;
use App\Client;
use App\Order;

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

        $cart = session("cart");
        $totalPrice = 0;

        foreach ($cart as $value) {
            $totalPrice += number_format($value["price"],2);
        }

        $totalPrice = number_format($totalPrice,2);

        return view('pages.checkout', compact('cart', 'totalPrice'));
    }

    public function storeClientInfo(Request $request) {

        dd($request->all());

        $data = $request->validate([
            'name'=> 'required|string|max:60',
            'lastname'=> 'required|string|max:60',
            'address'=> 'required|string',
            'email'=> 'required|email|unique',
            'phone'=> 'required|string|max:20|unique',
        ]);

        $client = Client::create($data);

        return;
    }
    
    public function orderStats() {

        return view('pages.orderStatitics');
    }

    public function getOrders() {

        $orders = Order::all();

        return json_encode($orders);
    }
}
