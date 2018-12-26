<?php

namespace App\Http\Controllers;

use App\Category;
use App\CommentRating;
use App\Order;
use App\Product;
use App\User;

class DashBoardController extends Controller
{
    public function index()
    {
        $categories = Category::count('id');
        // return $categories;
        $users = User::count('id');
        // return $users;
        $products = Product::count('id');
        // return $products;
        $orders = Order::count('id');
        // return $orders;
        $comments = CommentRating::count('id');
        // return $comments;
        return view('Admin.dashboard')->with('data', [[$categories, 'category'], [$users, 'user'], [$products, 'product'], [$orders, 'order'], [$comments, 'comment']]);
    }
}
