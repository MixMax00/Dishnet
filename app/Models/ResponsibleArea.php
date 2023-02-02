<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsibleArea extends Model
{
    use HasFactory;

    public function areas_name()
    {
        return $this->belongsTo(Area::class,'area_id','area_id');
    }


}
