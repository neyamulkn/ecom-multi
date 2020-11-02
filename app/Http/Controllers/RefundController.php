<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Refund;
use App\Models\RefundConversation;
use App\Models\RefundReason;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RefundController extends Controller
{
    //order return form
    public function orderReturn($order_id, $product_slug)
    {
        $user_id = Auth::id();
        $data['order_detail'] = OrderDetail::where('user_id', $user_id)
            ->where('order_id', $order_id)
            ->join('products', 'order_details.product_id', 'products.id')
            ->where('products.slug', $product_slug)
            ->selectRaw('order_details.*, title,slug,feature_image')
            ->first();

        if($data['order_detail']) {
            $data['checkReturn'] = Refund::with('refundConversations')
                ->where('user_id', $user_id)
                ->where('order_id', $data['order_detail']->order_id)
                ->where('product_id', $data['order_detail']->product_id)->first();
            $data['reasons'] = RefundReason::where('status', 1)->get();

            return view('users.order-return')->with($data);
        }
        return back();
    }

    //user send order return request
    public function sendReturnRequest(Request $request){
        $request->validate([
            'return_reason' => 'required',
            'return_type' => 'required',
            'explain_issue' => 'required',
        ]);

        $user_id = Auth::id();
        $order_detail = OrderDetail::where('user_id', $user_id)
            ->where('order_id', $request->order_id)
            ->where('product_id', $request->product_id)
            ->first();
        //check valid or order
        if($order_detail){
            $qty = ($request->qty <= $order_detail->qty) ? $request->qty : $order_detail->qty;
            $refund_amount = $qty * $order_detail->price;
            $refund = new Refund();
            $refund->order_id = $order_detail->order_id;
            $refund->product_id = $order_detail->product_id;
            $refund->user_id = $user_id;
            $refund->qty = $qty;
            $refund->refund_amount = $refund_amount;
            $refund->return_type = $request->return_type;
            $refund->return_reason = $request->return_reason;
            $refund->seller_id = $order_detail->vendor_id;
            $refund->refund_status = 'pending';
            $send = $refund->save();

            if($send){
                $refundConversation = new RefundConversation();
                $refundConversation->refund_id = $refund->id;
                $refundConversation->order_id = $order_detail->order_id;
                $refundConversation->product_id = $order_detail->product_id;
                $refundConversation->sender_id = $user_id;
                $refundConversation->explain_issue = $request->explain_issue;
                if ($request->hasFile('return_image')) {
                    $image = $request->file('return_image');
                    $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('upload/images/refund_image'), $new_image_name);
                    $refundConversation->image = $new_image_name;
                }
                $refundConversation->save();
                Toastr::success('Return request send success.');
            }else{
                Toastr::error('Return request sending failed.');
            }
        }else{
            Toastr::error('Sorry something wront please try again.');
        }
        return back();
    }

    //user return request list
    public function userReturnRequestList()
    {
        $user_id = Auth::id();

        $returnRequests = Refund::join('products', 'refunds.product_id', 'products.id')
            ->join('order_details', 'refunds.product_id', 'order_details.product_id')
            ->where('refunds.user_id', $user_id)
            ->selectRaw('refunds.*, title,slug,feature_image,attributes')
            ->get();
        return view('users.orderReturnRequests')->with(compact('returnRequests'));

    }

    //admin return request list
    public function adminReturnRequestList()
    {
        $returnRequests = Refund::join('products', 'refunds.product_id', 'products.id')
            ->join('order_details', 'refunds.product_id', 'order_details.product_id')
            ->selectRaw('refunds.*, title,slug,feature_image,attributes')
            ->get();
        return view('users.orderReturnRequests')->with(compact('returnRequests'));

    }

}
