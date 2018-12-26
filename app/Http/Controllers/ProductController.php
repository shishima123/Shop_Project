<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('updated_at', 'DESC')->paginate(10);
        $categories = Category::all();
        // return $products;
        return view('Admin.product.index', compact('products', 'categories'));
    }

    public function sortBy($sort_by)
    {
        switch ($sort_by) {
            case "all":
                $products = Product::orderBy('updated_at', 'DESC')->paginate(10);
                $type = 'all';
                break;
            case "new":
                $products = Product::where('new', '1')->orderBy('updated_at', 'DESC')->paginate(10);
                $type = 'pending';
                break;
            case "top_selling":
                $products = Product::where('top_selling', '1')->orderBy('updated_at', 'DESC')->paginate(10);
                $type = 'complete';
                break;
            case "sale":
                $products = Product::where('sale', '1')->orderBy('updated_at', 'DESC')->paginate(10);
                $type = 'complete';
                break;   
        }
        $categories = Category::all();
        // return $orders;
        return view('Admin.product.index', compact('products', 'type', 'categories'));
    }

    public function edit($id)
    {      
return 'a';
    }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         $user = User::findorfail($id);
    //         $user->name = $request->name;
    //         $user->phone = $request->phone;
    //         $user->address = $request->address;
    //         $user->save();
    //         return redirect()->route('user.index')->with(['flash_type' => 'success', 'flash_message' => 'Success!!! Complete Update User.']);
    //     } catch (Exception $e) {
    //         return redirect()->route('user.index')->with(['flash_type' => 'danger', 'flash_message' => 'Fail!!! Fail To Update User.']);
    //     }
    // }

    public function store(ProductRequest $request)
    {
        // return $request;
        // try {
        $file = $request->file('productImage');
        $file_name = $file->getClientOriginalName();
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->parent_id;
        $product->price = $request->price;
        $product->new = $request->chkbNews;
        $product->top_selling = $request->chkTopSelling;
        $product->sale = $request->txtSaleOff;
        $product->description = $request->txtDescription;
        $product->content = $request->txtContent;
        $product->picture = $file_name;
        $file->move('upload/', $file_name);
        $product->save();
        return redirect()->route('product.index')->with(['flash_type' => 'success', 'flash_message' => 'Success!!! Complete Add Product.']);
        // } catch (Exception $e) {
        //     return redirect()->route('product.index')->with(['flash_type' => 'danger', 'flash_message' => 'Fail!!! Fail To Add Product.']);
        // }
    }

    public function destroy($id)
    {

        DB::beginTransaction();
        try {
            $product = Product::findorfail($id);
            $product->orders()->detach();
            $product->users()->detach();
            $product->delete();
            DB::commit();
            return redirect()->route('product.index')->with(['flash_type' => 'success', 'flash_message' => 'Success!!! Complete Delete Product.']);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('product.index')->with(['flash_type' => 'danger', 'flash_message' => 'Fail!!! Fail To Add Product.']);
        }
    }
}