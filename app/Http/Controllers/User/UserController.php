<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function dashboard()
    {
        $user_id = Auth::id();
        $data['profile'] = User::find($user_id);
        $data['orders'] = Order::with(['order_details.product:id,title,slug,feature_image'])->where('user_id', $user_id)->get();
        return view('users.dashboard')->with($data);
    }

    public function myAccount()
    {
        $data['user'] = User::find(Auth::id());
        $data['states'] = State::where('country_id', 18)->where('status', 1)->get();
        $data['cities'] = City::where('state_id', $data['user']->region )->where('status', 1)->get();
        $data['areas'] = Area::where('city_id', $data['user']->city )->where('status', 1)->get();
        return view('users.my-account')->with($data);
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'mobile' => ['required','unique:users,mobile,'.Auth::id()],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.Auth::id()],
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->birthday= $request->birthday;
        $user->blood = $request->blood;
        $user->gender = $request->gender;
        $user->user_dsc = $request->user_dsc;
        $update =$user->save();
        if($update){
            Toastr::success('Your profile update successful.');
        }else{
            Toastr::error('Sorry profile can\'t update.');
        }
        return back();
    }

    public function addressUpdate(Request $request){
        $request->validate([
            'region' => 'required',
            'city' => ['required'],
            'area' => ['required'],
            'address' => ['required'],
        ]);
        $user = User::find(Auth::id());
        $user->region = $request->region;
        $user->city = $request->city;
        $user->area = $request->area;
        $user->address= $request->address;
        $update = $user->save();
        if($update){
            Toastr::success('Your address update successful.');
        }else{
            Toastr::error('Sorry address can\'t update.');
        }
        return back();
    }


    public function changePasswordForm(Request $request){
        return view('users.password-change');
    }
    public function changePassword(Request $request){
        $check = User::where('id', Auth::id())->first();
        if($check) {
            $this->validate($request, [
                'old_password' => 'required',
                'password' => 'required|confirmed:min:6'
            ]);

            $old_password = $check->password;
            if (Hash::check($request->old_password, $old_password)) {
                if (!Hash::check($request->password, $old_password)) {
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Toastr::success('Password successfully change.', 'Success');
                    return redirect()->back();
                } else {
                    Toastr::error('New password cannot be the same as old password.', 'Error');
                    return redirect()->back();
                }
            } else {
                Toastr::error('Old password not match', 'Error');
                return redirect()->back();
            }
        }else{
            Toastr::error('Sorry your password cann\'t change.', 'Error');
            return redirect()->back();
        }
    }

}
