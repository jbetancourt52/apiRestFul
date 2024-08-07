<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; 

    protected $fillable = [
        'name', 'cost', 'id_category', 'status', 'date', 'description', 'quantity',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
