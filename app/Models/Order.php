<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'customer_id'
    ];


    public function payment(){
        return $this->hasOne(Payment::class);
    }
    public function order(){
        return $this->belongsTo(User::class);
    }
    
}
