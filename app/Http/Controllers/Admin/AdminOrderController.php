<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    //get all order by user id
    public function orderHistory(Request $request, $status='')
    {

        $orders = Order::orderBy('order_date', 'desc')->where('payment_method', '!=', 'pending');
        if($request->status){
            $orders = $orders->where('order_status', $request->status)->get();
            return view('admin.order.order-status')->with(compact('orders'));
        }
        if($status){
            $orders = $orders->where('order_status', $status)->get();
            return view('admin.order.order-status')->with(compact('orders'));
        }
        $orders = $orders->get();
        return view('admin.order.orders')->with(compact('orders'));
    }

    //show order details by order id
    public function orderInvoice($orderId){
        $order = Order::with(['order_details.product:id,title,slug,feature_image'])
            ->where('order_id', $orderId)->first();

        if($order){
            return view('admin.order.invoice')->with(compact('order'));
        }
        return view('404');
    }


    // change Order Status function
    public function changeOrderStatus(Request $request){
        $status = Order::where('order_id', $request->order_id)->first();
        if($status){
            $status->update([$request->field => $request->status]);
            $output = array( 'status' => true,  'message'  => 'Status '.str_replace( '-', ' ', $request->status).' successful.');
        }else{
            $output = array( 'status' => false,  'message'  => 'Status connot update.!');
        }
        return response()->json($output);
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
