<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Order;

class Payment extends Model
{
    use HasFactory;

    use HasFactory;
    /*
    **
    Los atributos que pueden llenarse masivamente
    **
    */

    protected $fillable = [
        'amount',
        'payed_at',
        'order_id'
    ];

    /*
    **
    Los atributos que deben ser mutados a fechas
    **
    */
    protected $dates = [
         'payed_at'
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
