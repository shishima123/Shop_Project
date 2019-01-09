<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
    public function getSearch(Request $request)
    {
        $search = Product::where('name', 'like', '%' . $request->search . '%')->orWhere('price', $request->search)->get();
        // return $search;
        return view('frontend.search', compact('search'));
    }
    public function show($id)
    {
        $all_products = Product::where('id', $id)->get();
        //return $products;
        return view('frontend.product', compact('all_products'));
    }
}
