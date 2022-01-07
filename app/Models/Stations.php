<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    use HasFactory;
    public function Seats()
    {
        return $this->hasMany('App\Models\Seats'); 
    }

    public function Trips()
    {
        return $this->belongsTo('App\Models\Trips');
    }
}

