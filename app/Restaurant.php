<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'owner_name',
        'restaurant_name',
        'restaurant_phone',
        'email',
        'password',
        'address',
        'image',
        'p_iva',

    ];

    // relazione 1 a molti piatti
    public function dishes()
    {

        return $this->hasMany(Dish::class);
    }

    // relazioni categorie
    public function categories()
    {

        return $this->belongsToMany(Category::class);
    }
}
