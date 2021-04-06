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
}
