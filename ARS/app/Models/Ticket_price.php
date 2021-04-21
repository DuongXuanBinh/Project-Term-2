<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket_price extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function flight(){
        return $this->belongsTo(Flight::class,'flight_id','id');
    }
    public function class(){
        return $this->belongsTo(Classes::class,'class_id','id');
    }
    public $timestamps = true;
}
