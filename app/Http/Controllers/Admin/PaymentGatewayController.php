<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PaymentGatewayController extends Controller
{
    use CreateSlug;
    public function index()
    {
        $paymentgateways = PaymentGateway::orderBy('id', 'asc')->get();
        return view('admin.payments.payment-gateway')->with(compact('paymentgateways'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'method_name' => 'required|unique:payment_gateways',
            'method_for' => 'required'
        ]);

        $data = new PaymentGateway();
        $data->method_name = $request->method_name;
        $data->method_slug = $this->createSlug('products', $request->method_name);
        $data->method_info =  $request->method_info;
        $data->public_key =  ($request->public_key) ? $request->public_key : null;
        $data->secret_key =  ($request->secret_key) ? $request->secret_key : null;
        $data->method_mode =  'test';
        $data->method_for =  'purchase';
        $data->status  =  ($request->status ? 1 : 0);
        //if feature image set
        if ($request->hasFile('method_logo')) {
            $image = $request->file('method_logo');
            $new_image_name = $image->getClientOriginalName();
            $image_path = public_path('upload/images/payment/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(95, 45);
            $image_resize->save($image_path);
            $data->method_logo = $new_image_name;
        }
        $store = $data->save();
        if($store){
            Toastr::success('Payment Gateway Create Successfully.');
        }else{
            Toastr::error('Payment Gateway cannot Create.!');
        }
        return back();
    }

    public function edit($id)
    {
        $data = PaymentGateway::find($id);
        echo view('admin.payments.edit.payment-gateway')->with(compact('data'));
    }

    public function update(Request $request)
    {
        $data = PaymentGateway::find($request->id);
        $data->method_name = $request->method_name;
        $data->method_info =  $request->method_info;
        $data->public_key =  ($request->public_key) ? $request->public_key : null;
        $data->secret_key =  ($request->secret_key) ? $request->secret_key : null;

        //if method logo set
        if ($request->hasFile('method_logo')) {
            //delete image from folder
            $image_path = public_path('upload/images/payment/'. $data->method_logo);
            if(file_exists($image_path) && $data->method_logo){
                unlink($image_path);
            }
            $image = $request->file('method_logo');
            $new_image_name = $image->getClientOriginalName();
            $image_path = public_path('upload/images/payment/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(95, 45);
            $image_resize->save($image_path);
            $data->method_logo = $new_image_name;
        }
        $update = $data->save();

        if($update){
            Toastr::success('Payment Gateway updated.');
        }else{
            Toastr::error('Payment Gateway connot updated.');
        }
        return back();
    }

    public function delete($id)
    {
        $find = PaymentGateway::find($id);

        if($find){
            //delete image from folder
            $image_path = public_path('upload/images/payment/'. $find->method_logo);
            if(file_exists($image_path) && $find->method_logo){
                unlink($image_path);
            }
            $find->delete();
            $output = [
                'status' => true,
                'msg' => 'Payment Gateway deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Payment Gateway cannot deleted.'
            ];
        }
        return response()->json($output);
    }

    // payment mode change function
    public function paymentModeChange(Request $request){
        $mode = PaymentGateway::find($request->id);
        if($mode){
            if($mode->method_mode == 'sandbox'){
               $mode->update(['method_mode' => 'live']);
               $output = array( 'status' => true,  'message'  => 'Payment gateway is now live mode.');
            }else{
                $mode->update(['method_mode' => 'sandbox']);
                $output = array( 'status' => true,  'message'  => 'Payment gateway is now test mode.');
            }

        }else{
            $output = array( 'status' => false,  'message'  => 'Payment gateway cannot update.');
        }
        return response()->json($output);
    }


}
