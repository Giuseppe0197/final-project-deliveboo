<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function showRestaurant($id) {

        $restaurant = User::findOrfail($id);

        return view('pages.singleMenu', compact('restaurant'));
    }
}
