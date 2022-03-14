<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\User;

class GuestController extends Controller
{
    public function home()
    {

        $restaurantDef = User::inRandomOrder()->limit(12)->get();

        return view('pages.homepage', compact('restaurantDef'));
    }
}
