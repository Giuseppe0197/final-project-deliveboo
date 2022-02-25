<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price',
        'payment_status',
        'date',
        'client_id'
    ];

    // relazione 1 a 1 clienti
    public function client()
    {

        return $this->belongsTo(Client::class);
    }

    // relazione molti a molti piatti
    public function dishes()
    {

        return $this->belongsToMany(Dish::class);
    }
}
