<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
    public function create() {

        return view('pages.createDish');
    }
}
