<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        if (Auth::user()) {
            $userId = Auth::id();
            $chkCart = Cart::where('user_id', $userId)->first();
            $product_buy = Product::where('id', $id)->firstOrFail();
            // return $chkCart;
            if (!$chkCart) {
                //create new cart for this user
                $new_cart = new Cart;
                $new_cart->user_id = $userId;
                $new_cart->save();

                //add product to this cart
                $cart_detail = new CartDetail;
                $cart_detail->cart_id = $new_cart->id;
                $cart_detail->product_id = $product_buy->id;
                $cart_detail->qty = 1;
                $cart_detail->save();
            } else {
                $cart_details = CartDetail::where('cart_id', $chkCart->id)->get();
                $chkCartDetailProduct = false;
                foreach ($cart_details as $cart_detail) {
                    if ($cart_detail->product_id == $product_buy->id) {
                        $chkCartDetailProduct = true;
                        break;
                    }
                }
                // return $checkExists;
                if ($chkCartDetailProduct) {
                    $qty = $cart_detail->qty + 1;
                    CartDetail::where('id', $cart_detail->id)
                        ->update(['qty' => $qty]);
                } else {
                    $cart_detail = new CartDetail;
                    $cart_detail->cart_id = $chkCart->id;
                    $cart_detail->product_id = $product_buy->id;
                    $cart_detail->qty = 1;
                    $cart_detail->save();
                }
            }
            return redirect()->route('index');
        } else {
            return view('frontend.loginRequire');
        }
    }
    public function getCartInfo()
    {
        $user_id = Auth::id();
        $cart_detail = Cart::where('user_id', $user_id)->with('products')->withCount('products')->firstOrFail();
        return $cart_detail;
    }
}
