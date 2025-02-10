<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'slashed_price',
        'weight_quantity',
        'stock_availability',
        'images'
    ];

    protected $casts = [
        'images' => 'array', 
    ];
}
