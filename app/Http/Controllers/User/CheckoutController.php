<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Cart;
use App\Models\City;
use App\Models\GeneralSetting;
use App\Models\ShippingAddress;
use App\Models\State;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //order checkout
    public function checkout()
    {
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(isset($_COOKIE['user_id'])){
                $user_id =  $_COOKIE['user_id'];
            }
        }
        $data = [];
        $cartItems = Cart::with('get_product:id,shipping_cost')->where('user_id', $user_id);
        //check direct checkout
        if(isset($_COOKIE['direct_checkout_product_id'])){
            $cartItems = $cartItems->where('product_id', $_COOKIE['direct_checkout_product_id']);
        }
        $data['cartItems'] =  $cartItems->get();

        if(count($data['cartItems'])>0){
            $data['states'] = State::where('country_id', 18)->where('status', 1)->get();
            $data['get_shipping'] = ShippingAddress::with(['get_state','get_city', 'get_area'])->where('user_id', $user_id)->get();

            if(count($data['get_shipping'])>0){
                return redirect()->route('shippingReview');
            }
            return view('frontend.checkout.checkout')->with($data);
        }else{
            Toastr::error("Your shopping cart is empty. You don\'t have any product to checkout.");
            return redirect('/');
        }
    }

    // get city by state
    public function get_city(Request $request, $id){
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(isset($_COOKIE['user_id'])){
                $user_id =  $_COOKIE['user_id'];
            }
        }
        $data = [];

        $cartItems = Cart::join('products', 'carts.product_id', 'products.id')
            ->where('user_id', $user_id)
            ->selectRaw('sum(qty*price) total_price, shipping_method, ship_region_id, shipping_cost, other_region_cost')
            ->groupBy('product_id');
            //check direct checkout
            if(isset($_COOKIE['direct_checkout_product_id'])){
                $cartItems = $cartItems->where('product_id', $_COOKIE['direct_checkout_product_id']);
            }
            $cartItems =  $cartItems->get();

        $total_amount = array_sum(array_column($cartItems->toArray(), 'total_price'));

        //set shipping region id for shipping cost
        Session::put('ship_region_id', $id);
        $total_shipping_cost = null;
        foreach($cartItems as $item) {
             $shipping_cost = $item->shipping_cost;
             //check shipping method
             if($item->shipping_method == 'location'){
                 if ($item->ship_region_id != $id) {
                    $shipping_cost = $item->other_region_cost;
                 }
             }
             $total_shipping_cost += $shipping_cost;
        }

        $cities = City::where('state_id', $id)->get();
        $output = $allcity = '';
        if(count($cities)>0){
            $allcity .= '<option value="">Select city</option>';
            foreach($cities as $city){
                $allcity .='<option '. (old("city") == $city->id ? "selected" : "" ).' value="'.$city->id.'">'.$city->name.'</option>';
            }
        }
        $coupon_discount = (Session::get('couponType') == '%' ? $total_amount * Session::get('couponAmount') : Session::get('couponAmount') );
        $grandTotal = ($total_amount + $total_shipping_cost) - $coupon_discount;
        $output = array( 'status' => true, 'shipping_cost' => $total_shipping_cost, 'couponAmount' => $coupon_discount, 'grandTotal' => $grandTotal, 'allcity'  => $allcity);
        return response()->json($output);
    }

    // get area by city
    public function get_area($id=0){
        $areas = Area::where('city_id', $id)->get();
        $output = '';
        if(count($areas)>0){
            $output .= '<option value="">Select area</option>';
            foreach($areas as $area){
                $output .='<option '. (old("area") == $area->id ? "selected" : "" ).' value="'.$area->id.'">'.$area->name.'</option>';
            }
        }
        echo $output;
    }

    public function ShippingRegister(Request $request) {

        if(!Auth::check()) {
            $gs = GeneralSetting::first();
            if ($gs->registration == 0) {
                Session::flash('alert', 'Registration is closed by Admin');
                Toastr::error('Registration is closed by Admin');
                return back();
            }

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|max:255'. ($request->account == 'register') ? '|unique:users' : '',
                'mobile' => 'required'. ($request->account == 'register') ? '|unique:users' : '',
                'region' => 'required',
                'city' => 'required',
                'area' => 'required',
                'address' => 'required',
            ]);

            $username = 'user'.rand(100000, 999999);
            $password = ($request['password']) ? $request['password'] : rand(100000, 999999);
            $user = new User;
            $user->name = $request->name;
            $user->username = $username;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->region = $request->region;
            $user->city = $request->city;
            $user->area = $request->area;
            $user->address = $request->address;
            $user->password = Hash::make($password);
            $user->email_verification_token = $gs->email_verification == 1 ? rand(1000, 9999) : NULL;
            $user->mobile_verification_token = $gs->sms_verification == 1 ? rand(1000, 9999) : NULL;
            $new_user = $user->save();
            if ($new_user) {
                Auth::attempt([ 'username' => $username, 'password' => $password, ]);

                Cart::where('user_id', Session::get('user_id'))->update(['user_id' => Auth::id()]);
                //check duplicate records
                $duplicateRecords = Cart::select('product_id')
                    ->where('user_id', Auth::id())
                    ->selectRaw( 'id, count("product_id") as occurences')
                    ->groupBy('product_id')
                    ->having('occurences', '>', 1)
                    ->get();
                //delete duplicate record
                foreach($duplicateRecords as $record) {
                    $record->where('id', $record->id)->delete();
                }
            }
        }

        //if shipping_billing is checked then check validation
        if(!$request->shipping_address) {
            $request->validate([
                'shipping_name' => 'required',
                'shipping_email' => 'required|email|max:255',
                'shipping_phone' => 'required',
                'shipping_region' => 'required',
                'shipping_city' => 'required',
                'shipping_area' => 'required',
                'ship_address' => 'required',
            ]);
        }

        $shipping = new ShippingAddress();
        $shipping->user_id = Auth::id();
        $shipping->name = ($request->shipping_name) ? $request->shipping_name : $request->name;
        $shipping->email = ($request->shipping_email) ? $request->shipping_email : $request->email;
        $shipping->phone = ($request->shipping_phone) ? $request->shipping_phone : $request->mobile;
        $shipping->region = ($request->shipping_region) ? $request->shipping_region : $request->region;
        $shipping->city = ($request->shipping_city) ? $request->shipping_city : $request->city;
        $shipping->area = ($request->shipping_area) ? $request->shipping_area : $request->area;
        $shipping->address = ($request->ship_address) ? $request->ship_address : $request->address;
        $store = $shipping->save();

        if($store){
            Toastr::success('Shipping address added successful.');
        }else{
            Toastr::error("Shipping address cann\'t added.");
        }
        return redirect()->route('shipping');
    }
    //shipping review & choose one addresss
    public function shipping(){

        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(Session::has('user_id')){
                $user_id =  Session::get('user_id');
            }
        }
        $data = [];
        $cartItems = Cart::with('get_product:id,shipping_cost')->where('user_id', $user_id);
        //check direct checkout
        if(isset($_COOKIE['direct_checkout_product_id'])){
            $cartItems = $cartItems->where('product_id', $_COOKIE['direct_checkout_product_id']);
        }
        $data['cartItems'] =  $cartItems->get();

        if(count($data['cartItems'])>0){
            $data['states'] = State::where('country_id', 18)->where('status', 1)->get();
            $data['get_shipping'] = ShippingAddress::with(['get_state','get_city', 'get_area'])->where('user_id', $user_id)->get();
            //check shipping address
            if(count($data['get_shipping'])>0){
                return view('frontend.checkout.shipping_review')->with($data);
            }else{
                return redirect()->route('checkout');
            }
        }else{
            Toastr::error("Your shopping cart is empty. You don\'t have any product to checkout.");
            return redirect('/');
        }
    }

    //order checkout
    public function shippingReview()
    {
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(isset($_COOKIE['user_id'])){
                $user_id =  $_COOKIE['user_id'];
            }
        }
        $data = [];
        $cartItems = Cart::with('get_product:id,shipping_cost')->where('user_id', $user_id);
        //check direct checkout
        if(isset($_COOKIE['direct_checkout_product_id'])){
            $cartItems = $cartItems->where('product_id', $_COOKIE['direct_checkout_product_id']);
        }
        $data['cartItems'] =  $cartItems->get();

        if(count($data['cartItems'])>0){
            $data['states'] = State::where('country_id', 18)->where('status', 1)->get();
            $data['get_shipping'] = ShippingAddress::with(['get_state','get_city', 'get_area'])->where('user_id', $user_id)->get();

            if(count($data['get_shipping'])>0){
                return view('frontend.checkout.shipping_review')->with($data);
            }else{
                return back();
            }

        }else{
            Toastr::error("Your shopping cart is empty. You don\'t have any product to checkout.");
            return redirect('/');
        }
    }

    // get shipping address by shipping id
    public function getShippingAddress($shipping_id){

        $get_shipping = ShippingAddress::with(['get_state','get_city', 'get_area'])->where('user_id', Auth::id())->where('id', $shipping_id)->first();
        if($get_shipping) {
            //set shipping address by region id
            Session::put('ship_region_id', $get_shipping->region);
            //get shipping details by region id
           $shipping_addess =  '
                <div class="form-group" > <strong><i class="fa fa-user"></i></strong> '.$get_shipping->name.' </div>
                <div class="form-group" >  <strong><i class="fa fa-envelope"></i></strong> '.$get_shipping->email.' </div>
                <div class="form-group" > <strong><i class="fa fa-phone"></i></strong> '.$get_shipping->phone.' </div>
                <div class="form-group" > <strong><i class="fa fa-map-marker"></i></strong>'.
                        $get_shipping->address .', '.
                        $get_shipping->get_area->name .', '.
                        $get_shipping->get_city->name .', '.
                        $get_shipping->get_state->name .
               '</div>';
            $user_id = 0;
            if (Auth::check()) {
                $user_id = Auth::id();
            } else {
                if (isset($_COOKIE['user_id'])) {
                    $user_id = $_COOKIE['user_id'];
                }
            }
            $cartItems = Cart::join('products', 'carts.product_id', 'products.id')
                ->where('user_id', $user_id)
                ->selectRaw('sum(qty*price) total_price, shipping_method, ship_region_id, shipping_cost, other_region_cost')
                ->groupBy('product_id');
                //check direct checkout
                if (isset($_COOKIE['direct_checkout_product_id'])) {
                    $cartItems = $cartItems->where('product_id', $_COOKIE['direct_checkout_product_id']);
                }
                $cartItems = $cartItems->get();
            $total_amount = array_sum(array_column($cartItems->toArray(), 'total_price'));

            $total_shipping_cost = null;
            foreach ($cartItems as $item) {
                $shipping_cost = $item->shipping_cost;
                //check shipping method
                if ($item->shipping_method == 'location') {
                    if ($item->ship_region_id != $get_shipping->region) {
                        $shipping_cost = $item->other_region_cost;
                    }
                }
                $total_shipping_cost += $shipping_cost;
            }
            //calculate coupon discount
            $coupon_discount = round(Session::get('couponType') == '%' ? $total_amount * Session::get('couponAmount') : Session::get('couponAmount'), 2);
            $grandTotal = ($total_amount + $total_shipping_cost) - $coupon_discount;
            $output = array('status' => true, 'shipping_addess' => $shipping_addess, 'shipping_cost' => $total_shipping_cost, 'couponAmount' => $coupon_discount, 'grandTotal' => $grandTotal);
        }else{
            $output = array('status' => false);
        }
        return response()->json($output);
    }



}
