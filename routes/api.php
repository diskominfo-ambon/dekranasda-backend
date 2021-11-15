<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ProductIncreaseVisitorController;
use App\Http\Controllers\Api\PostIncreaseVisitorController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', PostsController::class, [
    'only' => ['index', 'show']
]);

Route::resource('products', ProductsController::class, [
    'only' => ['index', 'show']
]);

Route::post('/views/products/{id}', [ProductIncreaseVisitorController::class, 'store'])
    ->name('products.increase_visitor.index');

Route::post('/views/posts/{id}', [PostIncreaseVisitorController::class, 'store'])
    ->name('posts.increase_visitor.index');
