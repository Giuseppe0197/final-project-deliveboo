<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price',
        'payment_status',
        'date',
        // 'client_id'
    ];
}
