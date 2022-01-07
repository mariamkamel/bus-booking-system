<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    public function Stations()
    {
        return $this->belongsTo('App\Models\Stations');
    }

    public function Trips()
    {
        return $this->belongsTo('App\Models\Trips');
    }
}