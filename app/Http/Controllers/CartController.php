<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function cartAdd(Request $request)
    {
        $product = Product::find($request->product_id);
        $qty = 0;

        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(Session::has('user_id')){
                $user_id =  Session::get('user_id');
            }else{
                $user_id =  Session::put('user_id', rand(1000000000, 9999999999));
            }
        }
        setcookie('user_id', $user_id, time() + (86400), "/"); // 86400 = 1 day
        $cart_user = Cart::where('product_id', $product->id)->where('user_id', $user_id)->first();
        if($cart_user  && !$request->quantity){
            $qty = $cart_user->qty + 1;
        }else{
            $qty = $request->quantity;
        }
        //check quantity
        if($qty > $product->stock) {
            $output = array(
                'status' => 'error',
                'msg' => 'Out of stock'
            );
            return $output;
        }

        $attributes = $request->except(['product_id', 'quantity', 'buyDirect']);
        $attributes = json_encode($attributes);

        if($cart_user){
            $data = ['qty' => (isset($request->quantity)) ? $request->quantity : $cart_user->qty+1];
            //check attributes set or not
            if($request->quantity){
                $data = array_merge(['attributes' => $attributes], $data);
            }
            $cart_user->update($data);
        }else{
            //check weather have discount
            if ($product->discount) {
              $price = $product->selling_price - ($product->discount * $product->selling_price) / 100;
            } else {
              $price = $product->selling_price;
            }
            $data = [
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'title' => $product->title,
                'slug' => $product->slug,
                'image' => $product->feature_image,
                'qty' => (isset($request->quantity)) ? $request->quantity : 1,
                'price' => $price,
                'attributes' => $attributes,
            ];
            Cart::create($data);
        }

        $output = array(
            'status' => 'success',
            'title' => $product->title,
            'image' => $product->feature_image,
            'msg' => Config::get('siteSetting.cart_success')
        );

        return response()->json($output);

    }

    public function cartView()
    {
        setcookie('direct_checkout_product_id', '', time() - 3600);
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(isset($_COOKIE['user_id'])){
                $user_id =  $_COOKIE['user_id'];
            }
        }
        $cartItems = Cart::with('get_product')->where('user_id', $user_id)->get();
        return view('frontend.carts.cart')->with(compact('cartItems'));
    }

    public function cartUpdate(Request $request)
    {
        $request->validate([
            'qty' => 'required:numeric|min:1'
        ]);

        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(Session::has('user_id')){
                $user_id =  Session::get('user_id');
            }else{
                $user_id =  Session::put('user_id', rand(1000000000, 9999999999));
            }
        }
        $cart = Cart::with('get_product')->where('id', $request->id)->where('user_id', $user_id)->first();

        if($request->qty <= $cart->get_product->stock) {

            $cart->update(['qty' => $request->qty]);
            $cartItems = Cart::with('get_product')->where('user_id', $user_id);
            //check direct checkout
            if(isset($_COOKIE['direct_checkout_product_id'])){
                  $cartItems = $cartItems->where('product_id', $_COOKIE['direct_checkout_product_id']);
            }
            $cartItems = $cartItems->get();

            if($request->page == 'checkout'){
                return view('frontend.checkout.order_summery')->with(compact('cartItems'));
            }else{
                return view('frontend.carts.cart_summary')->with(compact('cartItems'));
            }

        }else{
            return response()->json(['status' => 'error', 'msg' => 'Out of stock']);
        }

    }


    public function itemRemove(Request $request, $id)
    {
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(Session::has('user_id')){
                $user_id =  Session::get('user_id');
            }
        }

        $cartItems = Cart::where('user_id', $user_id)->where('id', $id)->delete();
       if($cartItems){

           $cartItems = Cart::with('get_product')->where('user_id', $user_id)->get();
           if($request->page == 'checkout'){
               return view('frontend.checkout.order_summery')->with(compact('cartItems'));
           }
           return view('frontend.carts.cart_summary')->with(compact('cartItems'));

       }else{
           $output = array(
               'status' => 'error',
               'msg' => 'Cart item cannot delete.'
           );
       }
       return response()->json($output);
    }

    public function clearCart(){
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(Session::has('user_id')){
                $user_id =  Session::get('user_id');
            }
        }
        Cart::where('user_id', $user_id)->delete();
        //destroy coupon
        Session::forget('couponCode');
        Session::forget('couponAmount');
        return redirect()->back();
    }
}
