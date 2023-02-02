<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticateContact;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Representative extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
        /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $guarded = ["id"];

    protected $casts = [
        "responsible_area" => 'array',
        "status"  => 'integer',
    ];


    public  function areas()
    {
        return $this->hasMany(ResponsibleArea::class, 'em_id','employee_id');
    }

    public function general_settings(){
        return $this->belongsTo(GeneralSetting::class,'sp_id','sp_id');
    }






}
