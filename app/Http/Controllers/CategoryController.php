<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->with('children')->get();
        // return ($category);
        $new_products = Product::where('new', 1)->with('category')->take(10)->get();
        // return $new_products;

        $top_selling = Product::where('top_selling', 1)->with('category')->get();
        // return $top_selling;
        return view('frontend.index', compact('new_products', 'top_selling', 'categories'));

    }
}
