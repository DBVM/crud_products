<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    public function imageable(){
        //atributo morphs de la migración
        return $this->morphTo(); //Laravel automáticamente determina si es de user o de product el registro
    }
}
