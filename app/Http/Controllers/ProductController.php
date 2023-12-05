<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function showAllProducts()
    {
        $products = Product::all();

        return Inertia::render('Products', ['products' => $products]);
    }
}