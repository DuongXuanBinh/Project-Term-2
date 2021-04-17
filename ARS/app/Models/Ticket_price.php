<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_price extends Model
{
    use HasFactory;

    public function flight(){
        return $this->belongsTo(Flight::class,'flight_id','id');
    }
    public function class(){
        return $this->belongsTo(Classes::class,'class_id','id');
    }
    public $timestamps = true;
}
