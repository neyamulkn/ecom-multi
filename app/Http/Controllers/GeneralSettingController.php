<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\Social;
use App\Models\Upzilla;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class GeneralSettingController extends Controller
{
    use CreateSlug;
    public function __construct()
    {
        $setting = GeneralSetting::first();
        if(!$setting){
            GeneralSetting::create([
                'currency' => 'USD',
                'currency_symble' => '$'
            ]);
        }
    }

    //general Setting edit
    public function generalSetting()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.general-setting')->with(compact('setting'));
    }

    //general Setting update
    public function generalSettingUpdate(Request $request, $id)
    {
        $data  = [
            "site_name" => $request->site_name,
            "phone" => $request->phone,
            "email" => $request->email,
            "about" => $request->about,
            "address" => $request->address,
            "header" => $request->header_text,
            "footer" => $request->footer,
            "title" => $request->title,
            "meta_keywords" => ($request->meta_keywords) ? implode(',', $request->meta_keywords) : null,
            "description" => $request->description,
            "currency" => $request->currency,
            "currency_symble" => $request->currency_symble,
            "date_format" => $request->date_format,
        ];

        GeneralSetting::where('id', $id)->update($data);
        Toastr::success('Setting update success');
        return back();
    }


    public function logoSetting()
    {
        $setting = GeneralSetting::selectRaw('id, logo,invoice_logo,favicon')->first();
        return view('admin.setting.logo')->with(compact('setting'));
    }

    public function logoSettingUpdate(Request $request, $id)
    {
        $setting = GeneralSetting::find($id);

        //if  logo set
        if ($request->hasFile('logo')) {
            //delete previous logo
            $get_logo = public_path('upload/images/logo/'. $setting->logo);
            if(file_exists($get_logo) && $setting->logo){
                unlink($get_logo);
            }
            $image = $request->file('logo');
            $new_image_name = $this->uniqueImagePath('general_settings', 'logo', $image->getClientOriginalName());

            $image_path = public_path('upload/images/logo/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(300, 80);
            $image_resize->save($image_path);
            $setting->logo = $new_image_name;
        }
        //if invoice logo set
        if ($request->hasFile('invoice_logo')) {
            //delete previous logo
            $invoice_logo = public_path('upload/images/logo/'. $setting->invoice_logo);
            if(file_exists($invoice_logo) && $setting->invoice_logo){
                unlink($invoice_logo);
            }
            $image = $request->file('invoice_logo');
            $new_image_name = 'invoice-'.$this->uniqueImagePath('general_settings', 'invoice_logo', $image->getClientOriginalName());

            $image_path = public_path('upload/images/logo/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(300, 100);
            $image_resize->save($image_path);
            $setting->invoice_logo = $new_image_name;
        }
        //if favicon set
        if ($request->hasFile('favicon')) {
            //delete previous logo
            $get_favicon = public_path('upload/images/logo/'. $setting->favicon);
            if(file_exists($get_favicon) && $setting->favicon){
                unlink($get_favicon);
            }
            $image = $request->file('favicon');
            $new_image_name = 'favicon-'.$this->uniqueImagePath('general_settings', 'favicon', $image->getClientOriginalName());

            $image_path = public_path('upload/images/logo/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(32, 32);
            $image_resize->save($image_path);
            $setting->favicon = $new_image_name;
        }

        $setting->save();
        Toastr::success('Logo update sucess');
        return back();

    }
    public function socialSetting()
    {
        $socials = Social::where('type', 'admin')->get();
        return view('admin.setting.social')->with(compact('socials'));
    }
    public function socialSettingStore(Request $request)
    {
        $name_icon = explode('*', $request->social_name);
        $social = new Social();
        $social->type = 'admin';
        $social->social_name = $name_icon[0];
        $social->icon = $name_icon[1];
        $social->link = $request->link;
        $social->background = $request->background_color;
        $social->text_color = $request->text_color;
        $social->status = ($request->status) ? 1 : 0;
        $social->save();
        Toastr::success('Insert success');
        return back();
    }
    public function socialSettingEdit($id){
        $social = Social::find($id);
        return view('admin.setting.social-edit');
    }
    public function socialSettingUpdate(Request $request, $id)
    {
        $social = Social::find($id);
        $social->icon = $request->icon;
        $social->link = $request->link;
        $social->background = $request->background;
        $social->text_color = $request->text_color;
        $social->save();
        Toastr::success('Update success');
        return back();
    }

    public function socialSettingDelete($id){
        $social = Social::find($id);

        if($social){
            $social->delete();
            $output = [
                'status' => true,
                'msg' => 'Item deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Item cannot deleted.'
            ];
        }
        return response()->json($output);

    }

    public function footerSetting()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.logo')->with(compact('setting'));
    }
    public function footerSettingUpdate(Request $request, $id)
    {
        //
    }
}
