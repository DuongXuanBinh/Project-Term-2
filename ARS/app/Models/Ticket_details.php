<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket_details extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table ='ticket_details';

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
