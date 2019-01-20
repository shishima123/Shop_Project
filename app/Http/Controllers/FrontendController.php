<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\CommentRating;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function store($cate = 'all-products', Request $request)
    {
        if ($cate === 'all-products') {
            $category = '';
            $products = Product::orderBy('created_at')->with('category')
                ->paginate(9);

            // check if request is ajax then return json
            if ($request->ajax()) {
                return $products;
            }
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

                    $products = Product::whereIn('category_id', $getIdSubCategory)->with('category')
                        ->paginate(9);
                } else {
                    $products = Product::where('category_id', '=', $category->id)->with('category')
                        ->paginate(9);
                }

                // check if request is ajax then return json
                if ($request->ajax()) {
                    return $products;
                }
                // return $products;

                return view('frontend.store', compact('category', 'products'));
            } else {
                return redirect()->route('notFound');
            }
        }
    }

    public function getSearch(Request $request)
    {

        if ($request->category === 'all-categories') {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->with('category')
                ->paginate(9)
                ->appends(request()->query()); //including other GET parameters
        } else {
            $category = Category::where('keyword', '=', $request->category)
                ->first();

            $getIdSubCategory = $category
                ->subCategories()
                ->pluck('id');

            $products = Product::whereIn('category_id', $getIdSubCategory)
                ->where('name', 'like', '%' . $request->search . '%')->with('category')
                ->paginate(9)
                ->appends(request()->query()); //including other GET parameters
        }

        // check if request is ajax then return json
        if ($request->ajax()) {
            return $products;
        } else {
            return view('frontend.search', compact('products'));
        }
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
        //dd($request->session()->get('cart'));
        return redirect()->route('index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('frontend.shopcart', ['addtocart' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);
        return view('frontend.shopcart', ['addtocart' => $cart->items, 'totaLPrice' => $cart->totaLPrice]);
    }

    public function notFound()
    {
        return redirect()->route('notFound');
    }

    public function getError()
    {
        return view('frontend.error');
    }
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('frontend.shopcart', ['addtocart' => null]);
        }
        $oldCart = Session::get('cart');
        //dd($oldCart);
        $cart = new cart($oldCart);
        $total = $cart->totaLPrice;
        //dd($total);
        return view('frontend.checkout', ['total' => $total]);
    }

    public function commentRating(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
            $product_id = $id;

            $ratings = CommentRating::where('product_id', $id)->selectRaw('id, sum(rating) AS sumRating, count(rating) AS countRating')->groupBy('product_id')->first();

            //insert commerating to table comment_ratings
            $comment_rating = new CommentRating;
            $comment_rating->user_id = $user_id;
            $comment_rating->product_id = $product_id;
            $comment_rating->content = $request->comment;
            $comment_rating->rating = $request->rating;
            $comment_rating->save();

            //Update rating product in table product
            if ($ratings) { //check product is rating
                $new_rating = ($ratings->sumRating + $comment_rating->rating) / ($ratings->countRating + 1);
            } else {
                $new_rating = $comment_rating->rating;
            }
            $product = Product::where('id', $id)->firstOrFail();
            $product->rating = $new_rating;
            $product->save();
            DB::commit();

            return redirect()
                ->route('product', $id)
                ->with(['flash_type' => 'success', 'flash_message' => 'Success!!! Complete Comment and Rating Product.']);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()
                ->route('product', $id)
                ->with(['flash_type' => 'danger', 'flash_message' => 'Fail!!! Somethings wrong when Comment and Rating Product. Please try again.']);
        }
    }
}
