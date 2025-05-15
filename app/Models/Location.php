<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'capacity',
        'typelocation',
    ];

    function orders(){
        return $this->hasMany(Orders::class);
    }
}
