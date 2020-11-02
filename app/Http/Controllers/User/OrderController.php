<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShippingAddress;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //Insert order in order table
    public function orderConfirm(Request $request)
    {
        $shipping_address = ShippingAddress::with(['get_country','get_state','get_city', 'get_area'])->find($request->confirm_shipping_address);

        if($shipping_address) {
            $user_id = Auth::id();
            //generate unique order id
            $order_id = $user_id . strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -8));
            //get cart items
            $cartItems = Cart::join('products', 'carts.product_id', 'products.id')
                ->where('user_id', $user_id)
                ->selectRaw('carts.*, sum(qty*price) total_price, shipping_method, ship_region_id, shipping_cost, other_region_cost, vendor_id')
                ->groupBy('product_id');
                //check direct checkout
                if(isset($_COOKIE['direct_checkout_product_id'])){
                    $cartItems = $cartItems->where('product_id', $_COOKIE['direct_checkout_product_id']);
                }
                $cartItems = $cartItems->get();
            if(!count($cartItems)>0) {
                return redirect()->back();
            }
                $total_qty = array_sum(array_column($cartItems->toArray(), 'qty'));
                $total_price = array_sum(array_column($cartItems->toArray(), 'total_price'));
                $coupon_discount = null;
                if (Session::has('couponAmount')) {
                    $coupon_discount = (Session::get('couponType') == '%') ? round($total_price * Session::get('couponAmount'), 2) : Session::get('couponAmount');
                }

                //insert order in order table
                $order = new Order();
                $order->order_id = $order_id;
                $order->user_id = $user_id;
                $order->total_qty = $total_qty;
                $order->total_price = $total_price;
                $order->coupon_code = (Session::has('couponCode') ? Session::get('couponCode') : null);
                $order->coupon_discount = $coupon_discount;

                $order->billing_name = Auth::user()->name;
                $order->billing_phone = Auth::user()->mobile;
                $order->billing_email = Auth::user()->email;
                $order->billing_country = Auth::user()->country;
                $order->billing_region = Auth::user()->region;
                $order->billing_city = Auth::user()->city;
                $order->billing_area = Auth::user()->area;
                $order->billing_address = Auth::user()->address;

                $order->shipping_name = $shipping_address->name;
                $order->shipping_phone = $shipping_address->phone;
                $order->shipping_email = $shipping_address->email;
                $order->shipping_country = $shipping_address->get_country->name;
                $order->shipping_region = $shipping_address->get_state->name;
                $order->shipping_city = $shipping_address->get_city->name;
                $order->shipping_area = $shipping_address->get_area->name;
                $order->shipping_address = $shipping_address->address;
                $order->order_notes = $request->order_notes;
                $order->currency = Config::get('siteSetting.currency');
                $order->currency_sign = Config::get('siteSetting.currency_symble');
                $order->currency_value = Config::get('siteSetting.currency_symble');
                $order->order_date = now();
                $order->payment_status = 'pending';
                $order->order_status = 'pending';
                $order = $order->save();

                if ($order) {
                    // insert product details in table
                    $total_shipping_cost = 0;
                    foreach ($cartItems as $item) {
                        $shipping_cost = $item->shipping_cost;
                        //check shipping method
                        if ($item->shipping_method == 'location') {
                            if ($item->ship_region_id != $shipping_address->region) {
                                $shipping_cost = $item->other_region_cost;
                            }
                        }
                        $total_shipping_cost += $shipping_cost;

                        $orderDetails = new OrderDetail();
                        $orderDetails->order_id = $order_id;
                        $orderDetails->user_id = $user_id;
                        $orderDetails->product_id = $item->product_id;
                        $orderDetails->qty = $item->qty;
                        $orderDetails->price = $item->price;
                        $orderDetails->shipping_charge = $shipping_cost;
                        $orderDetails->coupon_discount = (Session::has('couponAmount') ? ($coupon_discount / $total_price) * ($item->price*$item->qty) : null);
                        $orderDetails->attributes = $item->attributes;
                        $orderDetails->shipping_status = 'pending';
                        $orderDetails->save();
                        //cart id for cart item delete
                        $cart_id[] = $item->id;
                    }
                    //insert total shipping cost
                    Order::where('order_id', $order_id)->update(['shipping_cost' => $total_shipping_cost]);
                    //delete cart item
                    Cart::whereIn('id', $cart_id)->delete();
                }

            //redirect payment method page for payment
            return redirect()->route('order.paymentGateway', $order_id);
        }else{
            Toastr::error('Please select shipping address.');
            return back();
        }
    }

    //get all order by user id
    public function orderHistory()
    {
        $orders = Order::with(['order_details.product:id,title,slug,feature_image'])->where('user_id', Auth::id())->get();
        return view('users.order-history')->with(compact('orders'));
    }

    //show order details by order id
    public function orderDetails($orderId){
        $order = Order::with(['order_details.product:id,title,slug,feature_image','get_country', 'get_state', 'get_city', 'get_area'])
            ->where('user_id', Auth::id())
            ->where('order_id', $orderId)->first();

        if($order){
            return view('users.order-details')->with(compact('order'));
        }
        return view('404');
    }


    //order cancel
    public function orderCancel ($order_id)
    {
        $order = Order::where('user_id', Auth::id())->where('order_id', $order_id)->first();

        if($order){
            $order->update(['order_status' => 'cancel']);
            $output = [
                'status' => true,
                'msg' => 'Order cancel successfully.'
            ];
        }else{
            $output = [
            'status' => false,
            'msg' => 'Order can\'t cancel.'
            ];
        }
        return response()->json($output);
    }

}
