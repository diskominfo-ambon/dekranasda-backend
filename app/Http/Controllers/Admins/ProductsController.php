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

        $products = Product::published()
            ->with('user')
            ->byKeyword('title', $keyword)
            ->paginate();

        return view('admins.products.index', compact('products', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['name', 'slug']);

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
        dump($request->validationData());
        dd($request->all());

        $product = Product::create($request->validationData());

        $product->categories()->attach($request->categories);
        $product->attachments()->attach($request->attachments);

        return redirect()
            ->route('admins.produk')
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
        $product = Product::findOrFail($id)->first();

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
        $product = Product::findOrFail($id)->first();

        return view('admins.products.edit', compact('product'));
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
        dd($request->all());
        $product = Product::published()->findOrFail($id);

        $product->update($request->getData());

        $product->attachments()->sync($request->only('attachments'));

        return redirect()
            ->route('admins.produk.index')
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
    }
}
