<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductIncreaseVisitorController extends Controller
{
    public function store(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        views($product)->record();

        return new JsonResponse([
            'data' => [
                'message' => "Product [id]: {$id} was be increase.",
                'views' => $product->views()->count()
            ],
            'error' => false
        ], 200);
    }
}
