<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    public $timestamps = true;
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
