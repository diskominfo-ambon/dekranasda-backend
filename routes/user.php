<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ProductsController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\ProfilesController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::resource('produk', ProductsController::class, ['names' => 'products']);

Route::get('/akun', [ProfilesController::class, 'edit'])
    ->name('profiles.edit');
Route::put('/akun', [ProfilesController::class, 'update'])
    ->name('profiles.update');
