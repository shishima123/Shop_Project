<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::with('products')->get();
        return view('frontend.index', compact('data'));
    }
}
