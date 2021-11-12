<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductIncreaseVisitorController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UploadersController;

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

Auth::routes();

Route::get('/views/products/{id}', [ProductIncreaseVisitorController::class, 'store'])
    ->name('products.increase_visitor.index')
    ->middleware('is_ajax');

Route::resource('uploaders', UploadersController::class, [
    'middleware' => ['auth', 'is_ajax']
]);
