<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table ='classes';

    public function ticket_prices(){
        return $this->hasMany(Ticket_price::class,'class_id','id');
    }
    public function seats(){
        return $this->hasMany(Seat::class,'class_id','id');
    }

}
