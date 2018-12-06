<?php

namespace App\Http\Controllers;

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
//TODO: Chuyển đống này qua bên task scheulding để tự động update sau 60'
