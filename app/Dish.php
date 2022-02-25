<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'image',
        'avilability',
        'restaurant_id'
    ];

    // relazione molti a molti Ordini
    public function orders()
    {

        return $this->belongsToMany(Order::class);
    }

    // relazione 1 a molti ristoranti
    public function restaurant()
    {

        return $this->belongsTo(Restaurant::class);
    }
}
