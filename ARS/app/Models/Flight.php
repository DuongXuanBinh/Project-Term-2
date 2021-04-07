<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function ticket_prices(){
        return $this->hasMany(Ticket_price::class,'flight_id','id');
    }
    public function planes(){
        return $this->belongsTo(Plane::class,'planeid','id');
    }
    public function airports_origin(){
        return $this->belongsTo(Airport::class,'origin_airportid','id');
    }

    public function airports_arrival(){
        return $this->belongsTo(Airport::class,'arrival_airportid','id');
    }
    public function flight_statuses(){
        return $this->belongsTo(Plane::class,'statusid','id');
    }
    public function ticket_details(){
        return $this->hasMany(Ticket_details::class,'flight_id','id');
    }
    protected $casts = [
        'id' => 'string'
    ];


    public $incrementing = false;

}
