<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $casts = [
        'payment_date' => 'date',
        'payment_status' => 'integer',
        'payment_method' => 'integer',
        'service_charge' => 'integer',
        'paid_amount'    => 'integer',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','customer_id');
    }
}
