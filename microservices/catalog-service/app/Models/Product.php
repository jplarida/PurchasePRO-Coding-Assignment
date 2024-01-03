<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'image_path',
    ];

    // Add any relationships or additional methods as needed

    protected $casts = [
        'price' => 'decimal:2', // Ensure the 'price' attribute is cast to a decimal with 2 decimal places
    ];
}

?>
