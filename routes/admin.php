<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admins\UsersController;
use App\Http\Controllers\Admins\ProductsController;
use App\Http\Controllers\Admins\PostsController;
use App\Http\Controllers\Admins\HomeController;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::resource('produk', ProductsController::class);
Route::resource('pengguna', UsersController::class);
Route::resource('post', PostsController::class);
