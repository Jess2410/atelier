<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Http\Models\Product;

class CartController extends Controller
{
    public function addCart($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $cartCounter = new Collection();

            $cartCounter->push([
                'product' => $product,
                'quantity' => 1,
            ]);

            return redirect()->route('cart.show');

        }
    }

    public function showCart()
    {  
        $cartCounter = new Collection(); 

        return view('cart', ['cartCounter' => $cartCounter]);
    }
}
