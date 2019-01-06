<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $new_products = Product::where('new', 1)->with('category')->take(10)->get();
        $top_selling = Product::where('top_selling', 1)->with('category')->get();
        return view('frontend.index', compact('new_products', 'top_selling'));
    }

    public function store($cate = 'all-products')
    {
        if ($cate === 'all-products') {
            $category = '';
            $products = Product::orderBy('created_at')->paginate(9);
        } else {
            $category = Category::where('keyword', '=', $cate)->with('parentCategories')->first();
            $products = Product::where('category_id', '=', $category->id)->paginate(9);
        }
        // return $products;
        return view('frontend.store', compact('category', 'products', 'top_selling'));
    }
}
