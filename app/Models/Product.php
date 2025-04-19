<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'unit',
        'unit_value',
        'selling_price',
        'purchase_price',
        'discount',
        'tax',
        'image',
    ];

    // Define any relationships, accessors, or mutators here
}
