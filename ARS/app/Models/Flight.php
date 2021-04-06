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
}
