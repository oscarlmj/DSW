<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "App\Http\Controllers\HomeController@index")->name("home.index");

Route::get("/about", "App\Http\Controllers\HomeController@about")->name("home.about");

<<<<<<< HEAD
Route::get("/products","App\Http\Controllers\ProductsController@index")->name("home.products");

Route::get('/productos/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');

=======
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
>>>>>>> 8b0a46797a34f8ba03618962800db0daaaa6c5b7
