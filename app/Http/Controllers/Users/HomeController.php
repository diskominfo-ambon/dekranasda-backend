<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    {
        $products = Auth::user()
            ->products()
            ->pending()
            ->get();
            
        return view('users.home', compact('products'));
    }
}
