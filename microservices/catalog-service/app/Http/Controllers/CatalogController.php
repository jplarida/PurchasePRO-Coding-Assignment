<?php
// app/Http/Controllers/CatalogController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function productList()
    {
        $products = Product::all();

        return response()->json(['products' => $products]);
    }

    public function productDetails($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json(['product' => $product]);
    }
}

?>
