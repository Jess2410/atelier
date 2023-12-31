<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

//Get the cart
Route::get('/cart', [CartController::class, 'getCart'])
    ->name('cart.get');

//Add a product into the cart
Route::post('/cart/add', [CartController::class, 'addToCart'])
    ->name('cart.add');


//Delete a product to the cart
Route::delete('/cart/delete', [CartController::class, 'deleteToCart'])
 ->name('cart.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
