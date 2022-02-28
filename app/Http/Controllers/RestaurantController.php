<?php

namespace App\Http\Controllers;

use App\Category;
/* use App\Restaurant; */

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function registerForm() {
        $categories = Category::all();

        return view('pages.register', compact( 'categories'));
    }

}
