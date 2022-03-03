<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ClientController extends Controller
{
    public function showRestaurant($id) {

        $restaurant = User::findOrfail($id);

        return view('pages.singleRestaurant', compact('restaurant'));
    }
}
