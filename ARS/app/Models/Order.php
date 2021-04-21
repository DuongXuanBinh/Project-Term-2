<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function flight(){
        return $this->belongsTo(Order::class,'flight_id','id');
    }
    public function account(){
        return $this->belongsTo(Account::class,'account_id','id');
    }
    public function ticket_details(){
        return $this->hasMany(Ticket_details::class,'order_id','id');
    }
    public function order_status(){
        return $this->belongsTo(Order_status::class,'order_status','id');
    }
    protected $casts = [
        'id' => 'string'
    ];
    public $timestamps = true;
    public $incrementing = false;
    protected $dates = ['deleted_at'];


}
