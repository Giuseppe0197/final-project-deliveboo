<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Restaurant;

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
}
