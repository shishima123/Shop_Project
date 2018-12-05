<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // $data = Category::with('products')->where('parent_id', 0)->get();
        $top_selling = Category::join('products', 'categories.id', '=', 'products.category_id')->join('order_items', 'products.id', '=', 'order_items.product_id')->groupBy('order_items.product_id')->selectRaw('count(order_items.product_id) as total_items, order_items.*, products.*')->orderBy('total', 'DESC')->get();
        return $top_selling;
        return view('frontend.index', compact('data'));
    }
}
