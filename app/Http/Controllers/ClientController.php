<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Category;
use App\Dish;
use App\User;

use Illuminate\Support\Facades\DB;
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
    
    public function orderStats($id) {

        $restaurant = User::findOrfail($id);

        $orders = DB::table('users')
            ->join('dishes', 'users.id', '=', 'dishes.user_id')
            ->join('dish_order', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('orders', 'dish_order.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->where('users.id', '=', $id)
            ->groupBy('orders.id')
            ->orderByDesc('orders.date')
            ->select('orders.id', 'total_price', 'payment_status', 'date', 'clients.name', 'clients.lastname', 'clients.address', 'clients.email', 'clients.phone')
            ->get();


        return view('pages.orderStatitics', compact('restaurant', 'orders'));
    }


    public function getOrders($id) {

        // SELECT dishes.name, dishes.price, dishes.description, dishes.type, dish_order.dish_quantity FROM users
        //     JOIN dishes
        //         ON dishes.user_id = users.id
        //     JOIN dish_order
        //         ON dish_order.dish_id = dishes.id
        //     JOIN orders
        //         ON orders.id = dish_order.order_id
        //     WHERE orders.id = 84

        $dishes = DB::table('users')
            ->join('dishes', 'users.id', '=', 'dishes.user_id')
            ->join('dish_order', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('orders', 'orders.id', '=', 'dish_order.order_id')
            ->where('orders.id', '=', $id)
            ->select('dishes.name', 'dishes.price', 'dishes.description', 'dishes.type', 'dish_order.dish_quantity')
            ->get();
        

        return json_encode($dishes); 
    }
}
