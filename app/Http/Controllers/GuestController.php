<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class GuestController extends Controller
{
    public function home() {

        $categories = Category::all();

        return view('pages.homepage', compact('categories'));
    }
}
