<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Http\Models\Product;
use App\Http\Models\Cart;

use Inertia\Inertia;

class CartController extends Controller
{
     public function addToCart(Request $request, $productId)
    {
     
        $request->validate([
            'product_id' => 'required|number|max:255',
          ]);


        $cartItem = Cart::where('product_id', $productId)->first(); 

        if ($cartItem) {
          
            $cartItem->increment('quantity');
        } else {
            
            Cart::create([
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully']);
    }
    

    public function showCart()
    {  
        $cartCounter = new Collection(); 

        return Inertia::render('Cart', ['cartCounter' => $cartCounter]);
    }
}
