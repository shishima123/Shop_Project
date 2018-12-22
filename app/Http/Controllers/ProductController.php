<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        // return $products;
        return view('Admin.product.index', compact('products', 'categories'));
    }

    // public function edit($id)
    // {
    //     $user = User::where('id', $id)->with('products')->first();
    //     return view('Admin.user.edit', compact('user'));
    // }

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

    // public function store(UserRegisterRequest $request)
    // {
    //     try {
    //         $user = new User;
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = bcrypt($request->password);
    //         $user->role = $request->role;
    //         $user->save();
    //         return redirect()->route('user.index')->with(['flash_type' => 'success', 'flash_message' => 'Success!!! Complete Add User.']);
    //     } catch (Exception $e) {
    //         return redirect()->route('user.index')->with(['flash_type' => 'danger', 'flash_message' => 'Fail!!! Fail To Add User.']);
    //     }
    // }

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
