<?php

namespace App\Http\Controllers;

use App\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $new_products = Product::where('new', 1)->with('category')->take(10)->get();
        $top_selling = Product::where('top_selling', 1)->with('category')->get();
        return view('frontend.index', compact('new_products', 'top_selling', 'categories'));
    }
}
