<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Assuming you have a user/session authentication mechanism
        $userId = auth()->user()->id; // Adjust this based on your authentication setup

        // Create or retrieve the order for the user's session
        $order = Order::firstOrCreate(['user_id' => $userId, 'status' => 'cart']);

        // Add the selected product to the order details
        $orderDetail = new OrderDetail([
            'product_id' => $productId,
            'quantity' => $request->input('quantity', 1),
            // Add other details as needed
        ]);

        $order->orderDetails()->save($orderDetail);

        return response()->json(['message' => 'Product added to cart successfully']);
    }
}

?>
