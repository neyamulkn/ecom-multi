<?php

namespace App\Http\Controllers\Vendor;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor;
use App\Models\GeneralSetting as GS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class VendorRegController extends Controller
{
    public function registerForm() {
        $data['states'] = State::where('country_id', 18)->where('status', 1)->get();
        return view('seller.register')->with($data);
    }

    public function register(Request $request) {
        // return $request->all();

        $gs = GS::first();
        if ($gs->registration == 0) {
          Session::flash('alert', 'Registration is closed by Admin');
          return back();
        }

        $validatedRequest = $request->validate([
            'shop_name' => 'required|unique:vendors',
            'email' => 'required|email|max:255|unique:vendors',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);


        $vendor = new Vendor;
        $vendor->shop_name = $request->shop_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->password = bcrypt($request->password);

        $vendor->save();

        return back()->with('message', 'Your informations will be reviewed by Admin. We will let you know about the update (after review) through Phone\Email once it\'s been checked!');
    }
}
