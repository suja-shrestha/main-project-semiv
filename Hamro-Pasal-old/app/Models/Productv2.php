<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productv2 extends Model
{
    // Table name (optional if using default naming convention)
    protected $table = 'productv2';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
        'reviews',
        'category',
        'is_new',
        'is_featured',
        'is_hot_sale',
        'is_best_deal',

    ];

    // Cast 'reviews' JSON field to array
    protected $casts = [
        'reviews' => 'array',
        'price' => 'float',
        'stock' => 'integer',
    ];
}
