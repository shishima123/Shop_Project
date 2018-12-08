<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $new_products = Category::with('products')->where('parent_id', 0)->get();
        // return $new_products;

        $top_selling = Product::where('top_selling', 1)->get();
        return $top_selling;
        // return view('frontend.index', compact('new_products', 'top_selling'));

    }
}
