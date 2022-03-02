<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
