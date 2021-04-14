<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public function classes(){
        return $this->belongsTo(Classes::class,'class_id','id');
    }

    public function plane_types(){
        return $this->belongsTo(Plane_type::class,'plane_type','id');
    }
}
