<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
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

    public $incrementing = false;


}
