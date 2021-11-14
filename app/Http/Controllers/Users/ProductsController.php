<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productStatus = [
            Product::PENDING => 'pending',
            Product::PUBLISHED => 'diterbitkan',
            Product::REJECTED => 'ditolak',
        ];
        $keyword = $request->get('keyword', '');
        $status = $request->get('status', '');

        $products = Auth::user()
            ->products()
            ->byKeyword('title', $keyword)
            ->when(
                Str::of($status)
                    ->trim()
                    ->isNotEmpty(),
                fn ($builder) => $builder->whereStatus($status)
            )
            ->paginate(20);

        return view('users.products.index', compact('products', 'keyword', 'status', 'productStatus'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('users.products.create', compact('categories'));
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

        $product = Auth::user()
            ->products()
            ->create($request->validationData());

        $product->categories()->attach($categories);

        $product->attachments()->attach($attachments);

        return redirect()
            ->route('produk.index')
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

        return view('users.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Auth::user()
            ->products()
            ->with(['categories', 'attachments'])
            ->findOrFail($id);

        $categories = Category::all();

        return view('users.products.edit', compact('product', 'categories'));
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
        $product = Auth::user()
            ->products()
            ->findOrFail($id);

        $product->update($request->validationData());

        $product->attachments()->sync(
            $request->attachments
        );

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

        $product->delete();

        return redirect()
            ->back()
            ->with('message', 'Berhasil menghapus produk');
    }
}
