<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->with('children')->paginate(10);
        // return $categories;

        return view('Admin.category.index', compact('new_products', 'top_selling', 'categories'));

    }
}
