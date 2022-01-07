<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    
    public function Seats()
    {
        return $this->hasMany('App\Models/Seats'); 
    }

    public function Trips()
    {
        return $this->hasMany('App\Models/Trips'); 
    }
}