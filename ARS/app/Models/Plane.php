<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;
    public function plane_types(){
        return $this->belongsTo(Plane_type::class,'plane_type','id');
    }
    public function flights(){
        return $this->hasMany(Flight::class,'plane_id','id');
    }
    public function seats(){
        return $this->hasMany(Seat::class,'plane_id','id');
    }
    public $timestamps = true;

}
