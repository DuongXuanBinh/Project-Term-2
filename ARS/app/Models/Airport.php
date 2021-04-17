<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

        public function route_direct_origins(){
            return $this->hasMany(Route_direct::class,'origin_airportid','id');
        }
        public function route_direct_transits(){
            return $this->hasMany(Route_direct::class,'transit_airportid','id');
        }
        public function route_direct_arrivals(){
            return $this->hasMany(Route_direct::class,'arrival_airportid','id');
        }
        public function flight_origins(){
            return $this->hasMany(Flight::class,'origin_airportid','id');
        }
        public function flight_arrivals(){
            return $this->hasMany(Flight::class,'arrival_airportid','id');
        }
    protected $casts = [
        'id' => 'string'
    ];

    public $incrementing = false;
}
