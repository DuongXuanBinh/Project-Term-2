<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_details extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsTo(Customer::class,'passenger_id','id');
    }
    public function flight(){
        return $this->belongsTo(Flight::class,'flight_id','id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public $timestamps = true;
}
