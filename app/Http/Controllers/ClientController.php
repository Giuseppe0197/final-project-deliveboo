<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;

class ClientController extends Controller
{
    public function showRestaurant($id) {

        $restaurant = User::findOrfail($id);

        // ricerca delle categorie associate al ristorante
        $categories = Category::all();
        $categories_restaurant = $restaurant -> categories() -> wherePivot('user_id', $id) -> get();

    return view('pages.singleRestaurant', compact('restaurant', 'categories_restaurant'));
    }
}
