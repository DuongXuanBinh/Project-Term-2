<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_details extends Model
{
    use HasFactory;
    public function customers(){
        return $this->belongsTo(Customer::class,'passenger_id','id');
    }
    public function flights(){
        return $this->belongsTo(Flight::class,'flight_id','id');
    }
    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
