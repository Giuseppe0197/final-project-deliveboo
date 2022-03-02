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
        'availability',
        'user_id'
    ];

    // relazione molti a molti Ordini
    public function orders()
    {

        return $this->belongsToMany(Order::class);
    }

    // relazione 1 a molti ristoranti
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
