<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
class CategoryController extends Controller
{
    public function index()
    {
        // $data = Category::with('products')->where('parent_id', 0)->get();

        /*query ra sản phẩm top_selling*/
        $top_selling=Category::join('products', 'categories.id', '=', 'products.category_id')->join('order_items', 'products.id', '=', 'order_items.product_id')->groupby('order_items.product_id')->selectRaw('count(order_items.product_id) as total_items, order_items.*, products.*')->orderBy('total','DESC')->take(5)->get();
        
        // return $top_selling;

        /*update sản phẩm top_selling vào cột topselling*/
        foreach($top_selling as $item)
        {
            /*TODO: Viết thêm câu query để set giá trị trong cột top selling=0 sau đó mới update*/
            Product::find($item->id)->update(['top_selling'=> 1]);
            echo $item->id;
        }

        // return $top_selling;
        // return view('frontend.index', compact('data'));

        //TODO: Chuyển đống này qua bên task scheulding để tự động update sau 60'
    }
}
