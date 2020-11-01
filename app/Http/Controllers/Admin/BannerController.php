<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    use CreateSlug;
    // Banner list
    public function index()
    {
        $banners = Banner::orderBy('position', 'asc')->get();
        return view('admin.banners.banner')->with(compact('banners'));
    }

    // store Banner
    public function store(Request $request)
    {

        $data = new Banner();
        $data->banner_type = $request->banner_type;
        $data->title = $request->title;
        $data->page_name = $request->page_name;

        $data->status = ($request->status ? 1 : 0);
        $data->created_by = Auth::guard('admin')->id();

        //if feature image set
        if ($request->hasFile('banner1')) {
            $image = $request->file('banner1');
            $new_image_name = rand(0000, 9999).$image->getClientOriginalName();
            $image_path = public_path('upload/images/banner/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(1170, 250);
            $image_resize->save($image_path);

            $data->banner1 = $new_image_name;
            $data->btn_link1 = $request->btn_link1;
        }
        if ($request->hasFile('banner2')) {
            $image = $request->file('banner2');
            $new_image_name = rand(0000, 9999).$image->getClientOriginalName();
            $image_path = public_path('upload/images/banner/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize($request->width, 250);
            $image_resize->save($image_path);

            $data->banner2 = $new_image_name;
            $data->btn_link2 = $request->btn_link2;
        }
        if ($request->hasFile('banner3')) {
            $image = $request->file('banner3');
            $new_image_name = rand(0000, 9999).$image->getClientOriginalName();
            $image_path = public_path('upload/images/banner/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize($request->width, 250);
            $image_resize->save($image_path);

            $data->banner3 = $new_image_name;
            $data->btn_link3 = $request->btn_link3;
        }

        $store = $data->save();

        if($store){
            Toastr::success('Banner added successfully.');
        }else{
            Toastr::error('Banner cannot added.!');
        }

        return back();
    }

    //Banner edit
    public function edit($id)
    {
        $data = Banner::find($id);
        echo view('admin.banners.editform')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $data = Banner::find($request->id);
        $data->title = $request->title;
        $data->page_name = $request->page_name;
        $data->status = ($request->status ? 1 : 0);
        $data->btn_link1 = $request->btn_link1;
        $data->btn_link2 = $request->btn_link2;
        $data->btn_link3 = $request->btn_link3;
        //if feature image set
        if ($request->hasFile('banner1')) {
            $image = $request->file('banner1');
            $new_image_name = rand(0000, 9999).$image->getClientOriginalName();
            $image_path = public_path('upload/images/banner/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(1170, 250);
            $image_resize->save($image_path);
            $data->banner1 = $new_image_name;

        }
        if ($request->hasFile('banner2')) {
            $image = $request->file('banner2');
            $new_image_name = rand(0000, 9999).$image->getClientOriginalName();
            $image_path = public_path('upload/images/banner/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize($request->width, 250);
            $image_resize->save($image_path);
            $data->banner2 = $new_image_name;

        }
        if ($request->hasFile('banner3')) {
            $image = $request->file('banner3');
            $new_image_name = rand(0000, 9999).$image->getClientOriginalName();
            $image_path = public_path('upload/images/banner/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize($request->width, 250);
            $image_resize->save($image_path);
            $data->banner3 = $new_image_name;

        }

        $update = $data->save();


        if($update){
            Toastr::success('Banner update successfully.');
        }else{
            Toastr::error('Banner cannot update.!');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        if($banner){
            for ($i=1; $i <= $banner->banner_type; $i++) {
                $banner_image = 'banner'.$i;
                $image_path = public_path('upload/images/banner/' . $banner->$banner_image);
                if ($banner->$banner_image && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $banner->delete();
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

    public function bannerImage_delete(Request $request){
        $bannerImage = Banner::find($request->id);
        $imageNo = 'banner'.$request->imageNo;

        if($bannerImage) {
            $image_path = public_path('upload/images/banner/' . $bannerImage->$imageNo);
            if ( $bannerImage->$imageNo && file_exists($image_path)) {
                unlink($image_path);
            }
            $bannerImage->$imageNo = null;
            $bannerImage->save();
            $output = [
                'status' => true,
                'msg' => 'Banner image deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Banner cann\'t deleted.'
            ];
        }
        return response()->json($output);
    }

}
