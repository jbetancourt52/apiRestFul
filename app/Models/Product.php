<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'producto'; 

    protected $fillable = [
        'pro_nombre', 'pro_descripcion', 'pro_costo', 'pro_cantidad', 'pro_categoria', 'pro_estado',
    ];
}
