<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', []);

        $products = Product::where(function (Builder $builder) use ($filter) {

            if (!is_array($filter)) return $builder;

            Arr::exists($filter, 'keyword') && Str::of($filter['keyword'])->trim()->isNotEmpty()
                && $builder->where('title', 'like', "%{$filter['keyword']}%");

            Arr::exists($filter, 'categories') && Str::of($filter['categories'])->trim()->isNotEmpty()
                && $categories = Str::of($filter['categories'])
                    ->lower()
                    ->split('/\,/')
                    ->all();

                    $builder->whereRelation(
                        'categories',
                        fn (Builder $innerBuilder) => $innerBuilder->whereIn('slug', $categories)
                    );

            return $builder;
        })
        ->get()
        ->all();

        return new ProductCollection($products);
    }

    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }
}
