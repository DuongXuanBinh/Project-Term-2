<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Account extends Model
{
    use SoftDeletes;
    use HasFactory , Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'firstname',
        'lastname',
        'address',
        'dob',
        'sex',
        'credit_number',
        'phone',
        'sky_miles',
        'role',
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $timestamps = true;
    public function cutomers(){
        return $this->hasMany(Customer::class,'account_id','id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'account_id','id');
    }


}
