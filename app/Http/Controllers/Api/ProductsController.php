<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(Request $request)
    {}

    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }
}
