<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/mon-profil', function () {
    return "Mon profil";
});
Route::post('/login', function (Request $request) {
    $name = $request->name;
    return "<h1>Bonjour ". $name . "</h1>";
});
Route::any('/any', function () {
    return "Any";
});

// Atelier Catalogue

    //Create a product
    Route::post('/products', [ProductController::class, 'addProduct'])
        ->name('products.addProduct');

    //Read all products
    Route::get('/products', [ProductController::class, 'showAllProducts'])
        ->name('products.showAllProducts');

    //Read a product by id
    Route::get('/products/{id}', [ProductController::class, 'showProductById'])
        ->name('products.showProductById');

    //Update a product by id
    Route::put('/products/{id}', [ProductController::class, 'updateProductById'])
        ->name('products.updateProductById');

    //Delete a product by id
    Route::delete('/products/{id}', [ProductController::class, 'deleteProductById'])
        ->name('products.deleteProductById');

    //Connect an user
    Route::post('/login', [UserController::class, 'login'])
        ->name('users.login');

    //Create a user
    Route::post('/users', [UserController::class, 'addUser'])
        ->name('users.addUser');

    //Read all users
    Route::get('/users', [UserController::class, 'showAllUsers'])
        ->name('users.showAllUsers');

    //Read an user by id
    Route::get('/users/{id}', [UserController::class, 'showUserById'])
        ->name('users.showUserById');

    //Update an user by id
    Route::put('/users/{id}', [UserController::class, 'updateUserById'])
        ->name('users.updateUserById');

    //Delete an user by id
    Route::delete('/users/{id}', [UserController::class, 'deleteUserById'])
        ->name('users.deleteUserById');

    //Read the cart
    Route::get('/cart', [CartController::class, 'showCart'])
        ->name('cart.showCart');

    //Add a product in the cart
    Route::post('/cart', [CartController::class, 'addCart'])
        ->name('cart.addProductById');
    //Delete a product in the cart
    Route::delete('/cart', [CartController::class, 'deleteProductById'])
        ->name('cart.deleteProductById');

