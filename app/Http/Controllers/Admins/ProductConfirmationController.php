<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductConfirmationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $slug = $request->get('slug', '');

        $products = Product::with('user')
            ->when(
                Str::of($slug)
                    ->trim()
                    ->isNotEmpty(),
                fn ($builder) => $builder->whereSlug($slug)
            )
            ->pending()
            ->byKeyword('title', $keyword)
            ->paginate(10);

        $products->append('keyword');

        return view('admins.products.confirmation', compact('products'));
    }


    public function update(int $id)
    {
        $product = Product::pending()->findOrFail($id);

        $product->status = Product::PUBLISHED;

        return redirect()
            ->back()
            ->message('message', 'Berhasil mengkonfirmasi produk');

    }

    public function destroy(int $id)
    {
        $product = Product::pending()->findOrFail($id);

        $product->status = Product::REJECTED;

        return redirect()
            ->back()
            ->message('message', 'Berhasil membatalkan produk');

    }
}
