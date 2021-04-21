<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plane_type extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function planes(){
        return $this->hasMany(Plane::class,'plane_type','id');
    }

    public function seats(){
        return $this->hasMany(Seat::class,'plane_type','id');
    }
    public $timestamps = true;
}
