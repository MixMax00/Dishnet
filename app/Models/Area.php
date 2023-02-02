<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    protected $casts = [
        "status"  => 'integer',
    ];

    public function area_location()
    {
        return $this->hasMany(AreaLocation::class, 'area', 'area_id');
    }


    public function representive(){
        return $this->belongsToMany(Representative::class)->withTimestamps();
    }
}
