<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $guarded = ["id"];

    protected $casts = [
        "isAccept" => 'integer',
        "status"  => 'integer',
    ];

     public function package()
     {
         return $this->belongsTo(Package::class,'package_id','package_id');
     }

     public function bill(){
         return $this->hasMany(Bill::class,'customer_id','customer_id');
     }

    public function general_settings(){
        return $this->belongsTo(GeneralSetting::class,'sp_id','sp_id');
    }


}
