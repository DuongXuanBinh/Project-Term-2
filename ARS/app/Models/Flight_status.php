<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight_status extends Model
{
    use HasFactory;
    public function flights(){
        return $this->hasMany(Flight::class,'statusid','id');
    }
}
