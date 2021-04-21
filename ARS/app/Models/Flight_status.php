<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight_status extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function flights(){
        return $this->hasMany(Flight::class,'statusid','id');
    }
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
