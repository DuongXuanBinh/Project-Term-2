<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;
    protected $table ='classes';
    protected $dates = ['deleted_at'];
    public function ticket_prices(){
        return $this->hasMany(Ticket_price::class,'class_id','id');
    }
    public function seats(){
        return $this->hasMany(Seat::class,'class_id','id');
    }

}
