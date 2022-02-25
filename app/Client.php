<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Order;
class Client extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'email',
        'phone',
    ];
    
    public function order()
    {
        return $this->hasOne(Order::class);
    }

}
