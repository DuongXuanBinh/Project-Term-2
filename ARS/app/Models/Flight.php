<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    public $timestamps = true;
    public function ticket_prices(){
        return $this->hasMany(Ticket_price::class,'flight_id','id');
    }
    public function plane(){
        return $this->belongsTo(Plane::class,'planeid','id');
    }
    public function route_direct(){
        return $this->belongsTo(Route_direct::class,'route_id','id');
    }

    public function flight_status(){
        return $this->belongsTo(Flight_status::class,'statusid','id');
    }
    public function ticket_details(){
        return $this->hasMany(Ticket_details::class,'flight_id','id');
    }
    protected $casts = [
        'id' => 'string',
    ];


    public $incrementing = false;

}
