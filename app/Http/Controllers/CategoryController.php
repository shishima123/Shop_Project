<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::with('products')->where('parent_id', 0)->get();
        // $top_selling = Product::with('orders')->get()->groupBy('pivot.product_id');
        // return $data;
        return view('frontend.index', compact('data'));
    }
}
