<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ProductsController;
use App\Http\Controllers\Users\HomeController;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::resource('produk', ProductsController::class, ['names' => 'products']);
