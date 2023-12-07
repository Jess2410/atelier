<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;

use Inertia\Inertia;

class CartController extends Controller
{
     public function addToCart(Request $request)
    {
     // récupération de la valeur de la requête POST
        $validated = $request->validate([
        'product_id' => 'required|numeric|max:5',
          ]);
          // on renomme le product_id en id
        $id = $validated['product_id'];

        $cartItem = Cart::where('product_id', $id)->first(); 

        if ($cartItem) {
          
            $cartItem->increment('quantity');
            $cartItem->save();
        } else {  
            Cart::create([
                'user_id' => 1,
                'product_id' => $id,
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
