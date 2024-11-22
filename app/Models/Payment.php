<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    /*
    **
    Los atributos que deben ser mutados a fechas
    **
    */
    protected $dates = [
         'payed_at'
    ];
}
