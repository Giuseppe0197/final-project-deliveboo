<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'email',
        'phone',
        'order_id'
    ];

    public function order()
    {

        return $this->hasOne(Order::class);
    }
}
