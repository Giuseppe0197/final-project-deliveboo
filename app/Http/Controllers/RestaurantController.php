<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Restaurant;
use App\Dish;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function registerForm() {
        $categories = Category::all();

        return view('pages.register', compact( 'categories'));
    }
 
    public function showRestaurant() {

        return view('pages.restaurantAuth');
    }

    public function getRestaurantInfo($id){
        $restaurants = User::findOrFail($id);
        
        return json_encode($restaurants);
    }

    public function findRestaurant($name) {

        $foundRestaurant = DB::table('users')
            ->where('users.restaurant_name', 'LIKE', "%$name%")
            ->select('users.*')
            ->get();

        return json_encode($foundRestaurant);
    }

    public function findRestaurantByCategoriesId($id) {

        $myArray = explode(',', $id);   

        $foundRestaurant = DB::table('users')
            ->join('category_user', 'category_user.user_id', '=', 'users.id')
            ->join('categories', 'categories.id', '=', 'category_user.category_id')
            ->whereIn('categories.id', $myArray)
            ->select('users.*')
            ->distinct()
            ->get();

        return json_decode($foundRestaurant);
    
    }


    public function getCategoriesId($id) { 

        $foundCategories = Category::findOrFail($id); 

        return json_encode($foundCategories); 
    } 

    public function getCategories() {

        $foundCategories = Category::all();

        return json_encode($foundCategories);
    }

    public function dishToggleAvailability($id) {

        $dish = Dish::findOrFail($id);

        $dish -> availability = !$dish -> availability;
        $dish -> save();

        return json_encode($dish);
    }

    public function charts($id) {
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

        return view('pages.charts', compact('restaurant', 'orders'));
    }
}
