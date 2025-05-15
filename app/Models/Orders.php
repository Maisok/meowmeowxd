<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'user_id',
        'locations_id',
        'dateTime',
        'price',
        'type_order',
        'cancelled_reason'
    ];

    function user(){
        return $this->hasOne(User::class);
    }

    
    function location(){
        return $this->hasOne(Location::class);
    }
}
