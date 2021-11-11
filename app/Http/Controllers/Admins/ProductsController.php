<?php

namespace App\Http\Controllers\Admins;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');

        $products = Product::with('user')
            ->byKeyword('title', $keyword)
            ->published()
            ->paginate();
        $countPendingProducts = Product::pending()->count();

        return view('admins.products.index', compact('products', 'keyword', 'countPendingProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admins.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        [$categories, $attachments] = array_values(
            $request->only('categories', 'attachments')
        );

        $product = Product::create(
            $request->validationData()
        );

        $product->categories()->attach($categories);

        $product->attachments()->attach($attachments);

        return redirect()
            ->route('admins.products.index')
            ->with('message', 'Berhasil menambahkan produk baru');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['categories', 'attachments'])->findOrFail($id);

        return view('admins.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with(['categories', 'attachments'])
            ->published()
            ->findOrFail($id);

        $categories = Category::all();

        return view('admins.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::published()->findOrFail($id);

        $product->update($request->validationData());

        $product->attachments()->sync(
            $request->attachments
        );

        return redirect()
            ->route('admins.products.index')
            ->with('message', 'Berhasil menyimpan perubahan produk.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus produk');
    }
}
