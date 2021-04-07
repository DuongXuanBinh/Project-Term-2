<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route_direct extends Model
{
    use HasFactory;

    public function airports_origin(){
        return $this->belongsTo(Airport::class,'origin_airportid');
    }

    public function airports_arrival(){
        return $this->belongsTo(Airport::class,'arrival_airportid','id');
    }
    
}
