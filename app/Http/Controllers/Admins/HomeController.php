<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Post;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * Find the product with the largest number of order page views.
         *
         * $products = Product::published()->orderByViews()->currentMonth()->limit(5)->get();
         */
        $products = Product::unpublished()->limit(10)->get();

        return view('admins.home', compact('products'));
    }
}
