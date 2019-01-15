<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Session;

class FrontendController extends Controller
{
    public function index()
    {
        $new_products = Product::where('new', 1)
            ->with('category')
            ->take(10)
            ->get();

        $top_selling = Product::where('top_selling', 1)
            ->with('category')
            ->take(10)
            ->get();

        return view('frontend.index', compact('new_products', 'top_selling'));
    }

    public function store($cate = 'all-products')
    {
        if ($cate === 'all-products') {
            $category = '';
            $products = Product::orderBy('created_at')
                ->paginate(9);
            return view('frontend.store', compact('category', 'products'));

        } else {
            $category = Category::where('keyword', '=', $cate)
                ->with('parentCategories')
                ->first();

            if ($category) { //check if url exists
                if ($category->parent_id === 0) {
                    $getIdSubCategory = $category
                        ->subCategories()
                        ->pluck('id');

                    $products = Product::whereIn('category_id', $getIdSubCategory)
                        ->paginate(9);
                } else {
                    $products = Product::where('category_id', '=', $category->id)
                        ->paginate(9);
                }
                return view('frontend.store', compact('category', 'products'));
            } else {
                return redirect()->route('notFound');
            }
        }
    }

    public function getSearch(Request $request)
    {
        if ($request->category === 'all-categories') {
            $products = Product::where('name', 'like', '%' . $request->search . '%')
                ->paginate(9)
                ->appends(request()->query());//including other GET parameters
        } else {
            $category = Category::where('keyword', '=', $request->category)
                ->first();

            $getIdSubCategory = $category
                ->subCategories()
                ->pluck('id');

            $products = Product::whereIn('category_id', $getIdSubCategory)
                ->where('name', 'like', '%' . $request->search . '%')
                ->paginate(9)
                ->appends(request()->query());//including other GET parameters
        }
        return view('frontend.search', compact('products'));
    }

    public function show($id)
    {
        try {
            $product = Product::where('id', '=', $id)
                ->with('image_products')
                ->firstOrFail();

            $category = $product
                ->category()
                ->first()
                ->parentCategories()
                ->first();

            $comment_ratings = $product
                ->users()
                ->paginate(5);

            $related_products = Product::inRandomOrder()
                ->with('category')
                ->take(4)
                ->get();

            return view('frontend.product', compact('product', 'category', 'comment_ratings', 'related_products'));
        } catch (Exception $e) {
            return redirect()->route('notFound');
        }
    }

    public function getAddToCart(Request $request, $id)
    {
        $addtocart = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($addtocart, $addtocart->id);
        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('frontend.shopcart', ['all_products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend.shopcart', ['all_products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function notFound()
    {
        return redirect()->route('notFound');
    }

    public function getError()
    {
        return view('frontend.error');
    }
}
