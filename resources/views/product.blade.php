<!-- resources/views/product.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>$product->name </h1>
<div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">


    <p>$product->description </p>
    <p>Price:  $product->price </p>
    <p>Stock: $product->stock </p>
</div>
    <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post">
        @csrf
        <button type="submit" >Add to Cart</button>
    </form>
@endsection