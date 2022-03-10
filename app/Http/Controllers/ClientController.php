<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Category;
use App\Dish;
use App\User;

use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function showRestaurant($id) {

        $restaurant = User::findOrfail($id);

        $dishes = Dish::all()->where('user_id', $id)->where('availability', '=', 1);

        $categories = Category::all();

        $categories_restaurant = $restaurant->categories()->wherePivot('user_id', $id)->get();

        return view('pages.singleRestaurant', compact('restaurant', 'dishes', 'categories_restaurant'));
    }

    public function checkout() {

        $cart = session("cart");
        $totalPrice = 0;

        foreach ($cart as $value) {
            $totalPrice += number_format($value["price"],2);
        }

        $totalPrice = number_format($totalPrice,2);

        return view('pages.checkout', compact('cart', 'totalPrice'));
    }
    
    public function orderStats($id) {

        $restaurant = User::findOrfail($id);

        return view('pages.orderStatitics', compact('restaurant'));
    }


    public function getOrders($id) {
        
        // DA COMPLETARE (STAMPARE SOLO L'ORDINE E NON TUTTI I PIATTI DELL'ORDINE)
        // $test = Order::findOrFail($x[$i]->id);
        
        $dishes = Dish::all()->where('user_id', $id);
        $orders = [];

        // Ciclo all'interno di dishes
        foreach ($dishes as $value) {
            
            // Prendiamo i valori dalla tabella ponte
            $orders []= $value->orders()->wherePivot('dish_id', '=', $value->id)->get();

            foreach ($orders as $x) {
                
                // Ciclo all'interno di ogni singolo ordine
                for ($i=0; $i < count($x); $i++) { 
    
                    // Aggiungiamo all'interno dell'array contenente il tutto, anche le informazioni del cliente associato.
                    $client = Client::findOrFail($x[$i]->client_id);
                    $x[$i]->info_client = $client;
                    
                }
                
            }
        }

        return json_encode($orders); 
    }
}
