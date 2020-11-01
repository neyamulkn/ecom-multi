<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Notification;
use App\Models\State;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor;
use App\Models\GeneralSetting as GS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class VendorRegController extends Controller
{
    use CreateSlug;
    public function registerForm() {
        $data['states'] = State::where('country_id', 18)->where('status', 1)->get();
        return view('vendors.register')->with($data);
    }

    public function register(Request $request) {

        $gs = GS::first();
        if ($gs->registration == 0) {
          Toastr::error('alert', 'Registration is closed by Admin');
          return back();
        }

        $validatedRequest = $request->validate([
            'shop_name' => 'required',
            'email' => 'required|email|max:255|unique:vendors',
            'mobile' => 'required',
            'password' => 'required|confirmed'
        ]);

        $vendor = new Vendor;
        $vendor->shop_name = $request->shop_name;
        $vendor->slug = $this->createSlug('vendors', $request->shop_name);
        $vendor->email = $request->email;
        $vendor->mobile = $request->mobile;
        $vendor->state = $request->state;
        $vendor->city = $request->city;
        $vendor->area = $request->area;
        $vendor->address = $request->address;
        $vendor->password = Hash::make($request['password']);;
        $success = $vendor->save();

        if($success) {
            if (Auth::guard('vendor')->attempt(['mobile' => $request->mobile, 'password' => $request->password,])) {
                //insert notification in database
                Notification::create([
                    'type' => 'vendor-register',
                    'fromUser' => Auth::guard('vendor')->id(),
                    'toUser' => 0,
                    'item_id' => Auth::guard('vendor')->id(),
                    'notify' => 'register new seller',
                ]);
                Toastr::success('Registration in success.');
                return redirect()->route('vendor.dashboard');
            }
        }else{
            Toastr::error('Registration failed try again.');
            return back()->withInput();
        }

        return back()->with('message', 'Your informations will be reviewed by Admin. We will let you know about the update (after review) through Phone\Email once it\'s been checked!');
    }
}
