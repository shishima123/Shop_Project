<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->withCount('subcategories')->get();

        // $categories = Category::with([
        //     'products',
        //     'children.products',
        // ])->get()->toSql();

        // $categories = Category::where('parent_id', 0)->with('subCategories.products')->withCount('products')->get(10);
        // return $categories;

        return view('Admin.category.index', compact('categories'));

    }

    public function store(Request $request)
    {

        try {
            $category = new Category;
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->save();

            return redirect()->route('category.index')->with(['flash_type' => 'success', 'flash_message' => 'Success!!! Add Category success.']);
        } catch (Exception $e) {
            return redirect()->route('category.index')->with(['flash_type' => 'danger', 'flash_message' => 'Fail!!! Fail to Add Category. Please try again.']);
        }

    }

    public function show($id)
    {
        return $id;
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $products= Product::where('category_id',$id)->get();
       foreach ($products as $product) {
        $product->orders()->detach();
        $product->users()->detach();
        $product->delete();
       }   
       Category::where('id',$id)->delete();
            DB::commit();
            return redirect()->route('category.index')->with(['flash_type' => 'success', 'flash_message' => 'Success!!! Complete Delete User.']);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('category.index')->with(['flash_type' => 'danger', 'flash_message' => 'Fail!!! Fail To Add User.']);
        }    
    }
}
