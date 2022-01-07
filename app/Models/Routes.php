<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    public function Stations()
    {
        return $this->belongsTo('App\Models\Stations');
    }
}
