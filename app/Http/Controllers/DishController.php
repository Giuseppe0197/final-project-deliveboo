<?php

namespace App\Http\Controllers;

use App\Dish;

use App\User;
use Illuminate\Http\Request;

class DishController extends Controller
{

    // funzione edit

    public function edit($id)
    {

        $dish = Dish::findOrFail($id);

        return view('pages.editDish', compact('dish'));
    }

    // funzione update

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:100',
            'type' => 'required|string',
            'image' => 'required|image'
        ]);


        $imageFile = $data['image'];
        $imageName = rand(100000, 999999) . '_' . time() . '.' . $imageFile->getClientOriginalExtension();

        $imageFile->storeAs('/images/', $imageName, 'public');

        $data['image'] = $imageName;
        
        $dish = Dish::findOrFail($id);
        $dish->update($data);
        
        return redirect()->route('dishes.list', $dish['user_id']);
    }

    public function create($id)
    {

        $restaurant = User::findOrFail($id);

        return view('pages.createDish', compact('restaurant'));
    }

    public function store(Request $request, $id)
    {
        // dd($request);
        // validazione dati 
        $data = $request->validate([

            'name' => 'required|string|max:60',
            'description' => 'required|string:max255',
            'price' => 'required|numeric|min:0|max:100',
            'type' => 'required|string|max:20',
            'image' => 'required|image',
            'availability' => 'required',
        ]);
        // dd($data['image']);

        $data['user_id'] = $id;
        // dd($data['user_id']);

        // salvo nome imagine da store
        $imageFile = $data['image'];

        // genero nome casuale per l'immagine => rand()
        // aggiungo l'estensione originale getClientOriginalExtension()
        $imageName = rand(100000, 999999) . '_' . time()
            . '.' . $imageFile->getClientOriginalExtension();

        // sposto il nome dell'immagine nella cartella images
        $imageFile->storeAs('/images/', $imageName, 'public');

        // aggiorno valore image
        $data['image'] = $imageName;

        // creo nuovo piatto 
        $dish = Dish::create($data);

        return redirect()->route('dishes.list', $data['user_id']);
    }

    // Funzione che ritorna tutti i piatti di un ristorante specifico
    public function getRestaurantDishes($id)
    {

        $restaurant = User::findOrFail($id);

        $dishes = Dish::all()->where('user_id', $id);

        return view('pages.dishList', compact('dishes', 'restaurant'));
    }

    // Funzione per cambiare la disponibilità del piatto
    public function hide($id)
    {

        $dish = Dish::findOrFail($id);

        if ($dish['availability'] == 0) {
            $dish['availability'] = 1;
        } else {
            $dish['availability'] = 0;
        }

        $dish->update();

        return redirect()->route('dishes.list', $dish['user_id']);
    }
}
