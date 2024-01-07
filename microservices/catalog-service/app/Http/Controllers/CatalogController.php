<?php
// app/Http/Controllers/CatalogController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function productList(Request $request)
    {
        $perPage = $request->input('per_page', 10); // You can adjust the default per page value

        $products = Product::paginate($perPage);

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
