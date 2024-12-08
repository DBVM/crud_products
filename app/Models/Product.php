<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Image;

class Product extends Model
{
      
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];

    public function carts(){
        return $this->morphedByMany(Cart::class,'productable')->withPivot('quantity');
    }
    public function orders(){
        return $this->morphedByMany(Order::class,'productable')->withPivot('quantity');
    }

    public function images(){
        //un producto puede tener varias imagenes
        return $this->morphToMany(Image::class,'imageable');
    }

    public function scopeAvailable($query){
        $query->where('status', 'available');
    }
}
