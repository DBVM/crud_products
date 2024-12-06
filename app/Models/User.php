<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Image;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $dates = [
        'admin_since'
   ];

   public function orders(){
    return $this->hasMany(Order::class,'customer_id');//relación uno a muchos
    //Un usuario(cliente) puede tener más de 1 orden
    //Y se indica el nombre de la columna en caso de que no sea 'id'
   }
   public function payments(){
    return $this->hasManyThrough(Payment::class, Order::class, 'customer_id');
    /* Desde user puedes acceder a los pagos de un usuario por medio de la relación que tiene user con order
     */
   }
   public function image(){
    //Relacion de 1 a 1
    return $this->morphOne(Image::class,'imageable');
   }
}
