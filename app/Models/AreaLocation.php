<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaLocation extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
        "status"  => 'integer',
    ];



    public function customer(){
        return $this->hasMany(Customer::class,'area_loc_id','area_location_id');
    }

}
