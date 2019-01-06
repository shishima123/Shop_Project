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
            if ($category) { //check if url exists
                if ($category->parent_id === 0) {
                    $getIdSubCategory = $category->subCategories()->pluck('id');
                    $products = Product::whereIn('category_id', $getIdSubCategory)->paginate(9);
                } else {
                    $products = Product::where('category_id', '=', $category->id)->paginate(9);
                }
                return view('frontend.store', compact('category', 'products'));
            } else {
                return view('frontend.error');
            }
        }
    }
}
