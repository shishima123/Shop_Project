<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $new_products = Category::with('products')->take(10)->get();
        // return $new_products;

        $top_selling = Product::where('top_selling', 1)->get();

        // dd($new_products);
        // foreach ($new_products as $key => $value) {
        //     echo $new_products;
        //     echo '<br>';
        // }
        // return $new_products;
        return view('frontend.index', compact('new_products', 'top_selling'));

    }
}