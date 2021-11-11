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

Route::get('produk/konfirmasi', [ProductConfirmationController::class, 'index'])
    ->name('products.confirmation');

Route::put('produk/konfirmasi/{id}', [ProductConfirmationController::class, 'update'])
    ->name('products.confirmation.update');

Route::delete('produk/konfirmasi/{id}', [ProductConfirmationController::class, 'destroy'])
    ->name('products.confirmation.destroy');

Route::resource('produk', ProductsController::class);
Route::resource('ketegori', CategoriesController::class, ['names' => 'categories']);
Route::resource('pengguna', UsersController::class, [
    'names' => 'users',
    'parameters' => [
        'pengguna' => 'id'
    ]
]);
Route::resource('post', PostsController::class);
