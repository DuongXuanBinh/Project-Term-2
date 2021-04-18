<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = true;
    public function account(){
        return $this->belongsTo(Account::class,'account_id','id');
    }
    public function ticket_detail(){
        return $this->hasOne(Ticket_details::class,'passenger_id','id');
    }
}
