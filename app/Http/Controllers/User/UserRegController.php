<?php

namespace App\Http\Controllers\User;

use App\Models\GeneralSetting;
use App\Models\Notification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserRegController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function RegisterForm() {
      return view('user.register');
    }

    public function register(Request $request) {

        $gs = GeneralSetting::first();
        if ($gs->registration == 0) {
          Session::flash('alert', 'Registration is closed by Admin');
          return back();
        }

        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request['password']);
        $user->email_verified_at = $gs->email_verification == 0 ? now() :NULL;
        $user->mobile_verified_at = $gs->sms_verification == 0 ? now() :NULL;
        $user->email_verification_token = $gs->email_verification == 0 ? rand(1000, 9999):NULL;
        $user->mobile_verification_token = $gs->sms_verification == 0 ? rand(1000, 9999):NULL;

        $success = $user->save();
        if($success) {
            if (Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password,])) {
                //insert notification in database
                Notification::create([
                    'type' => 'register',
                    'fromUser' => Auth::id(),
                    'toUser' => 0,
                    'item_id' => Auth::id(),
                    'notify' => 'register new user',
                ]);
                Toastr::success('Registration in success.');
                return redirect()->intended(route('user.dashboard'));
            }
        }else{
            Toastr::error('Registration failed try again.');
            return back()->withInput();
        }
    }
}
