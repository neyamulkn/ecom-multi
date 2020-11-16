<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripeController;
use App\Mail\OrderMail;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\PaymentGateway;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{

    //display payment gateway list in payment page
    public function orderPaymentGateway($orderId)
    {
        $order = Order::with('order_details.product:id,title,slug,feature_image')
            ->where('user_id', Auth::id())
            ->where('order_id', $orderId)->first();
        if($order){
            $paymentgateways = PaymentGateway::orderBy('position', 'asc')->where('status', 1)->get();
            return view('frontend.checkout.order-payment')->with(compact('order', 'paymentgateways'));
        }
        return view('404');
    }

    // process payment gateway & redirect specific gateway
    public function orderPayment(Request $request, $orderId){

        $order = Order::with('order_details.product:id,title')->where('user_id', Auth::id())->where('order_id', $orderId)->first();
        if($order){
            $data = [
                'order_id' => $order->order_id,
                'total_price' => $order->total_price + $order->shipping_cost - $order->coupon_discount,
                'total_qty' => $order->total_qty,
                'currency' => $order->currency,
                'payment_method' => $request->payment_method
            ];
            Session::put('payment_data', $data);
        }else{
            Toastr::error('Payment failed.');
            return redirect()->back();
        }

        if($request->payment_method == 'cash-on-delivery'){
            Session::put('payment_data.status', 'success');
            //redirect payment success method
            return $this->paymentSuccess();
        }
        elseif($request->payment_method == 'paypal'){
            //redirect PaypalController for payment process
            $paypal = new PaypalController;
            return $paypal->paypalPayment();
        }
        elseif($request->payment_method == 'masterCard'){
            //redirect StripeController for payment process
            Session::put('payment_data.stripeToken', $request->stripeToken);
            $paypal = new StripeController();
            return $paypal->masterCardPayment();
        }
        elseif($request->payment_method == 'manual'){

            Session::put('payment_data.payment_method', $request->manual_method_name);
            Session::put('payment_data.status', 'success');
            Session::put('payment_data.trnx_id', $request->trnx_id);
            Session::put('payment_data.payment_info', $request->payment_info);
            //redirect payment success method
            return $this->paymentSuccess();

        }else{
            Toastr::error('Please select payment method');
        }
        return back();
    }

    //payment status success then update payment status
    public function paymentSuccess(){

        $payment_data = Session::get('payment_data');
        //clear session payment data
        Session::forget('payment_data');
        if($payment_data && $payment_data['status'] == 'success') {
            $order = Order::where('user_id', Auth::id())
                ->where('order_id', $payment_data['order_id'])->update([
                    'payment_method' => $payment_data['payment_method'],
                    'tnx_id' => (isset($payment_data['trnx_id'])) ? $payment_data['trnx_id'] : null,
                    'order_date' => now(),
                    'payment_status' => (isset($payment_data['payment_status'])) ? $payment_data['payment_status'] : 'pending',
                    'payment_info' => (isset($payment_data['payment_info'])) ? $payment_data['payment_info'] : null,
                ]);

                //when one order multi payment work this
//                if(isset($payment_data['trnx_id'])) {
//                    OrderPayment::create([
//                        'user_id' => Auth::id(),
//                        'pay_method' => $payment_data['payment_method'],
//                        'amount' => $payment_data['total_price'],
//                        'txnid' => $payment_data['trnx_id'],
//                    ]);
//                }

                //insert notification in database
                Notification::create([
                    'type' => 'order',
                    'fromUser' => Auth::id(),
                    'toUser' => 0,
                    'item_id' => $payment_data['order_id'],
                    'notify' => 'received a new order',
                ]);

            return redirect()->route('order.paymentConfirm', $payment_data['order_id']);
        }

        return redirect()->route('user.orderHistory');
    }

    //payment complete thanks page
    public function paymentConfirm($orderId){

            $order = Order::with(['order_details.product:id,title,slug,feature_image','get_area','get_city','get_state'])->where('user_id', Auth::id())
                ->where('order_id', $orderId)->first()->toArray();

            //send notification in email
            //Mail::to(Auth::user()->email)->send(new OrderMail($order));
            Toastr::success('Thanks Your order submitted successfully');

            return view('frontend.checkout.payemnt-confirmation')->with(compact('order'));


    }

}
