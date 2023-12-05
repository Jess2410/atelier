<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showAllProducts()
    {
        $products = [
            ['name' => 'produit1', 'description' => 'Description du produit 1', 'price' => 10, 'id' => 1],
            ['name' => 'produit2', 'description' => 'Description du produit 2', 'price' => 20, 'id' => 2]
        ];

        return view('products', ['products' => $products]);
    }
}