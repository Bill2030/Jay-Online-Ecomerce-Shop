<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [ProductController::class,'index'])->name('index');
Route::get('/about', [ProductController::class,'about'])->name('about');
Route::get('/shop', [ProductController::class,'shop'])->name('shop');
Route::get('/contact', [ProductController::class,'contact'])->name('contact');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/addcart/{productId}', [ProductController::class,'addcart'])->name('addcart.cart');
Route::get('/addquantity/{productId}', [ProductController::class,'addquantity'])->name('addquantity');
Route::get('/decreasequantity/{productId}', [ProductController::class,'decreasequantity'])->name('decreasequantity');
Route::get('/removeitem/{productId}', [ProductController::class,'removeitem'])->name('removeitem');
Route::get('/clearcart', [ProductController::class,'clearcart'])->name('clearcart');
Route::get('/create', [ProductController::class,'create'])->name('products.create');
Route::post('/products', [ProductController::class,'store'])->name('products.store')->middleware('auth');;

//User Controllers
Route::get('/user/create', [UserController::class,'create'])->name('create');
Route::post('/user', [UserController::class, 'store'])->name('store');
Route::get('/user/login', [UserController::class,'login'])->name('login');
Route::post('/user/loginpost', [UserController::class,'loginuser'])->name('loginuser');
Route::get('/user/logout', [UserController::class,'logout'])->name('logout');


