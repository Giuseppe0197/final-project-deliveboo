<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function create() {

        return view('pages.createDish');
    }

    public function store(Request $request) {
        // dd($request);
        // validazione dati 
        $data = $request -> validate([

            'name' => 'required|string|max:60',
            'description' => 'required|string:max255',
            'price' => 'required|numeric|min:0|max:100',
            'type' => 'required|string|max:20',
            'image' => 'required|image',
            'availability' => 'required',
        ]);
        // dd($data['image']);

        $data['restaurant_id'] = rand(1,10);
        // dd($data['restaurant_id']);

        // salvo nome imagine da store
        $imageFile = $data['image'];

        // genero nome casuale per l'immagine => rand()
        // aggiungo l'estensione originale getClientOriginalExtension()
        $imageName = rand(100000, 999999) . '_' . time()
                    . '.' . $imageFile -> getClientOriginalExtension();

        // sposto il nome dell'immagine nella cartella images
        $imageFile -> storeAs('/images/', $imageName, 'public');

        // aggiorno valore image
        $data['image'] = $imageName;

        // creo nuovo piatto 
        $dish = Dish::create($data);

        return redirect() -> route('dishes.list', $data['restaurant_id']);
    }

    public function getRestaurantDishes($id) {

        $restaurant = Restaurant::findOrFail($id);

        $dishes = Dish::all()->where('restaurant_id', $id);

        return view('pages.dishList', compact('dishes'));
    }

    public function hide($id) {

        $dish = Dish::findOrFail($id);

        if ($dish['availability'] == 0) {
            $dish['availability'] = 1;
        } else {
            $dish['availability'] = 0;
        }

        $dish->update();

        return redirect()->route('dishes.list', $dish['restaurant_id']);
    }
}
