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
        'owner_id'
    ];
}
