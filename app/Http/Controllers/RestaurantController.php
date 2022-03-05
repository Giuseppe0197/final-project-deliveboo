<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Restaurant;
use App\Dish;

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

    public function findRestaurant() {
        $foundRestaurant = User::all();

        if($search = \Request::get('q')) {
            $foundRestaurant = User::where(function($query) use ($search) {
                $query -> where('restaurant_name', 'LIKE', "%$search%");
            }) -> paginate(20);
        }

        return json_encode($foundRestaurant);
    }

    public function findRestaurantByCategoriesId() {

        $test;

        if($join = \Request::get('ids')) {
            
            $test = User::join('category_user', function ($query) use ($join) {
            $query->on('users.id', '=', 'category_user.user_id')
                ->where('category_user.category_id', 'LIKE', "$join");
            })->paginate(20);
        }

        return json_encode($test);
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
}
