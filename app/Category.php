<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    // relazione molti a molti ristoranti
    public function users()
    {

        return $this->belongsToMany(User::class);
    }
}
