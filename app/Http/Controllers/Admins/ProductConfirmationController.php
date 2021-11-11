<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Notifications\ProductConfirmed;
use App\Notifications\ProductRejected;
use Illuminate\Http\Request;

class ProductConfirmationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');

        $products = Product::latest()
            ->pending()
            ->byKeyword('title', $keyword)
            ->paginate(20);

        $products->append('keyword');

        return view('admins.products.confirmation', compact('products', 'keyword'));
    }


    public function update(Request $request, int $id)
    {
        $product = Product::pending()->findOrFail($id);
        $product->user->notify( new ProductConfirmed($product));

        return redirect()
            ->back()
            ->with('message', 'Berhasil mengkonfirmasi produk');

    }

    public function destroy(Request $request, int $id)
    {

        $product = Product::pending()->findOrFail($id);
        $product->user->notify(new ProductRejected($product, $request->content));

        return redirect()
            ->back()
            ->with('message', 'Berhasil membatalkan produk');

    }
}
