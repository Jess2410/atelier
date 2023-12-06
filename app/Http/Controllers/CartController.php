<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Http\Models\Product;

class CartController extends Controller
{
     public function addToCart(Request $request, $productId)
    {
     
        $cartItem = Cart::where('product_id', $productId)->first();

        if ($cartItem) {
          
            $cartItem->increment('quantity');
        } else {
            
            Cart::create([
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully']);
    }
    

    public function showCart()
    {  
        $cartCounter = new Collection(); 

        return view('cart', ['cartCounter' => $cartCounter]);
    }
}
