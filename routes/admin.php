<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admins\UsersController;
use App\Http\Controllers\Admins\ProductsController;
use App\Http\Controllers\Admins\PostsController;
use App\Http\Controllers\Admins\HomeController;
use App\Http\Controllers\Admins\ProductConfirmationController;
use App\Http\Controllers\Admins\CategoriesController;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::resource('produk/konfirmasi', ProductConfirmationController::class, [
    'names' => 'products.confirmation',
    'only' => ['index', 'update', 'destroy']
]);
Route::resource('produk', ProductsController::class, ['names' => 'products']);
Route::resource('ketegori', CategoriesController::class, ['names' => 'categories']);
Route::resource('pengguna', UsersController::class, [
    'names' => 'users',
    'parameters' => [
        'pengguna' => 'id'
    ]
]);
Route::resource('post', PostsController::class);
