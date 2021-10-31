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
    /**
     * Mengecek apahkan key tertentu tersedia pada filter.
     *
     * @param [array] $filter
     * @param [string] $key
     * @return boolean
     */
    private function isFilterKeyAvaiable($filter, $key)
    {
        return is_array($filter)
            && Arr::exists($filter, $key)
                && Str::of($filter[$key])->trim()->isNotEmpty();
    }



    public function index(Request $request)
    {
        $filter = $request->filter;

        $products = Product::when(
                $this->isFilterKeyAvaiable($filter, 'keyword'),
                fn (Builder $builder) => $builder->where('title', 'like', "%{$filter['keyword']}%")
            )
            ->when($this->isFilterKeyAvaiable($filter, 'categories'), function (Builder $builder) use ($filter) {
                $categories = Str::of($filter['categories'])
                    ->lower()
                    ->split('/\,/');

                return $builder->whereRelation(
                    'categories',
                    fn (Builder $innerBuilder) => $innerBuilder->whereIn('slug', $categories)
                );
            })
            ->get();

        return new ProductCollection($products);
    }



    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }
}
