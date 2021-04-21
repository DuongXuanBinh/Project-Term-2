<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route_direct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function airports_origin(){
        return $this->belongsTo(Airport::class,'origin_airportid','id');
    }
    public function airports_arrival(){
        return $this->belongsTo(Airport::class,'arrival_airportid','id');
    }
    public function flights(){
        return $this->hasMany(Flight::class,'route_id','id');
    }
    public $timestamps = true;
}
