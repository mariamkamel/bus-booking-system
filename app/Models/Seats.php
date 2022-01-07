<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{

    public function Buses()
    {
        return $this->belongsTo('App\Models\Buses');
    }
}