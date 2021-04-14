<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Classes::class,'class_id','id');
    }

    public function plane_type(){
        return $this->belongsTo(Plane_type::class,'plane_type','id');
    }
}
