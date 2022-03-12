<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Restaurant;
use App\Dish;
use Illuminate\Support\Facades\DB;
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

        $foundRestaurant= User::all(); 

            $join = \Request::get('ids');
            $search = \Request::get('q');
             
            //se join é nulla o diversa da null mi ritorna restaurant name
            if ($join == null && $search != null){
                $foundRestaurant = User::where(function($query) use ($search) {
                    $query -> where('restaurant_name', 'LIKE', "%$search%");
                });
            }//se join é diversa da null e e search é null mi ritorna la categoria
            else if ($join != null && $search == null){
                $foundRestaurant = User::join('category_user', function ($query) use ($join, $search) {
                    $query->on('users.id', '=', 'category_user.user_id')
                    //explode mi trasforma una stringa in un array, perchè il numero di id viene passato tramite stringa
                        ->whereIn('category_user.category_id', explode(",",$join));                       
                    });
            }
            else{ //sennò mi ritorna il nome che inserisco con la categoria che inserisco 
                $foundRestaurant = User::join('category_user', function ($query) use ($join, $search) {
                $query->on('users.id', '=', 'category_user.user_id')
                //explode mi trasforma una stringa in un array, perchè il numero di id viene passato tramite stringa
                    ->whereIn('category_user.category_id', explode(",",$join))
                    ->where('users.restaurant_name', 'LIKE', "%$search%")
                    ->distinct('users'); 
                    //bug to fix, distinct. Se metto il nome e la checkbox del ristorante mi si sdoppia
                });

            }
        

        return json_encode($foundRestaurant ->paginate(20) );
    
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

    public function charts($id) {
        $restaurant = User::findOrfail($id);

        $orders = DB::table('users')
            ->join('dishes', 'users.id', '=', 'dishes.user_id')
            ->join('dish_order', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('orders', 'dish_order.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->where('users.id', '=', $id)
            ->groupBy('orders.id')
            ->orderByDesc('orders.date')
            ->select('orders.id', 'total_price', 'payment_status', 'date', 'clients.name', 'clients.lastname', 'clients.address', 'clients.email', 'clients.phone')
            ->get();

        return view('pages.charts', compact('restaurant', 'orders'));
    }
}
