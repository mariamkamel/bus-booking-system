<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;
    public function Seats()
    {
        return $this->hasMany('App\Models\Seats'); 
    }

    public function Stations()
    {
        return $this->hasMany('App\Models\Stations'); 
    }
}
