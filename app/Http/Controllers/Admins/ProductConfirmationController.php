<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductConfirmationController extends Controller
{
    public function index()
    {
        $products = Product::pending()->paginate(2);

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
