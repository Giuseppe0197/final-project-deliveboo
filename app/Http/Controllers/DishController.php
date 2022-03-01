<?php

namespace App\Http\Controllers;

use App\Dish;

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
            'price' => 'required|string',
            'type' => 'required|string',
            'image' => 'required|image'
        ]);


        $imageFile = $data['image'];
        $imageName = rand(100000, 999999) . '_' . time() . '.' . $imageFile->getClientOriginalExtension();

        $imageFile->storeAs('/images/', $imageName, 'public');


        $dish = Dish::findOrFail($id);

        $dish->update($data);
        return redirect()->route('dishes.list');
    }
}
