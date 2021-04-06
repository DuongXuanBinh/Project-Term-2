<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

        public function route_direct_origin(){
            return $this->hasMany(Route_direct::class,'origin_airportid','id');
        }
        public function route_direct_transit(){
            return $this->hasMany(Route_direct::class,'transit_airportid','id');
        }
        public function route_direct_arrival(){
            return $this->hasMany(Route_direct::class,'arrival_airportid','id');
        }
        public function flight_origin(){
            return $this->hasMany(Flight::class,'origin_airportid','id');
        }
        public function flight_arrival(){
            return $this->hasMany(Flight::class,'arrival_airportid','id');
        }
}
