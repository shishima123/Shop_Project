<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::with('products')->where('parent_id', 0)->get();
        $top_selling = Category::join('products', 'categories.id', '=', 'products.category_id')->join('order_items', 'products.id', '=', 'order_items.product_id')->groupBy('order_items.product_id')->selectRaw('count(order_items.product_id) as total_items, order_items.*, products.*,categories.name as category_name')->orderBy('total', 'DESC')->get();
        $cart = User::join('orders', 'users.id', '=', 'orders.user_id')->groupBy('users.id')->selectRaw('count(users.id) as total_items, users.*')->get();
        return $cart;
        // return $top_selling;
        // return $data;
        return view('frontend.index', compact('data', 'top_selling'));
    }
}
// $cart = User::join('orders', 'users.id', '=', 'orders.user_id')->join('order_items', 'orders.id', '=', 'order_items.order_id')->groupBy('users.id')->selectRaw('count(users.id) as total_items, order_items.*, users.*')->get();
