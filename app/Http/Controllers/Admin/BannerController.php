<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\bannerImage;
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
        $request->validate([
            'banner_type' => 'required',
            'btn_link' => 'required',
        ]);

        $data = new Banner();
        $data->banner_type = $request->banner_type;
        $data->title = $request->title;
        $data->title_size = $request->title_size;
        $data->title_color = $request->title_color;
        $data->title_style = $request->title_style;

        $data->subtitle = $request->subtitle;
        $data->subtitle_size = $request->subtitle_size;
        $data->subtitle_color = $request->subtitle_color;
        $data->subtitle_style = $request->subtitle_style;

        $data->text_position = $request->text_position;
        $data->status = ($request->status ? 1 : 0);
        $data->created_by = Auth::id();
        $store = $data->save();

        //if feature image set
        if ($request->hasFile('phato')) {
            $allimagepath = [];
            $images = $request->file('phato');
            $i = 0;
            foreach ($images as $image) {
                $new_image_name = $this->uniqueImagePath('banner_images', 'phato', $image->getClientOriginalName());

                $image_path = public_path('upload/images/banner/' . $new_image_name);
                $image_resize = Image::make($image);
                $image_resize->resize($request->width, 250);
                $image_resize->save($image_path);

                $setBanner = new bannerImage();
                $setBanner->banner_id = $data->id;
                $setBanner->phato = $new_image_name;
                $setBanner->btn_link = $request->btn_link[$i];
                $setBanner->save();
                $i++;
            }
        }

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
        $request->validate([
            'banner_type' => 'required',
            'btn_link' => 'required',
        ]);
        $data = Banner::find($request->id);
        $data->banner_type = $request->banner_type;
        $data->title = $request->title;
        $data->title_size = $request->title_size;
        $data->title_color = $request->title_color;
        $data->title_style = $request->title_style;

        $data->subtitle = $request->subtitle;
        $data->subtitle_size = $request->subtitle_size;
        $data->subtitle_color = $request->subtitle_color;
        $data->subtitle_style = $request->subtitle_style;
        $data->btn_text = $request->btn_text;
        $data->btn_link = $request->btn_link;
        $data->text_position = $request->text_position;
        $data->status = ($request->status ? 1 : 0);
        $data->updated_by = Auth::id();
        $update = $data->save();

        //if feature image set
        if ($request->hasFile('phato')) {
            $allimagepath = $data->phato ? json_decode($data->phato) : [];
            $images = $request->file('phato');
            foreach ($images as $image) {
                $new_image_name = $this->uniqueImagePath('banners', 'phato', $image->getClientOriginalName());

                $image_path = public_path('upload/images/banner/' . $new_image_name);
                $image_resize = Image::make($image);
                $image_resize->resize($request->width, 250);
                $image_resize->save($image_path);
                array_push($allimagepath, $new_image_name);
            }

            $setBanner = Banner::find($data->id);
            $setBanner->phato = $allimagepath;
            $setBanner->btn_link = json_encode($request->btn_link);
            $setBanner->save();
        }

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
            $image_path = public_path('upload/images/banner/'. $banner->phato);
            if(file_exists($image_path)){
                unlink($image_path);
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
        $banner = Banner::find($request->id);
        $allimagepath = $banner->phato ? json_decode($banner->phato) : [];
        unset($allimagepath[array_search($request->image_path, $allimagepath)]);

        $image_path = public_path('upload/images/banner/'. $request->image_path);
        if(file_exists($image_path)){
            unlink($image_path);
            //save update path
            $banner->phato = $allimagepath;
            $banner->save();
        }
        $output = [
            'status' => true,
            'msg' => 'Banner image deleted successfully.'
        ];
        return response()->json($output);
    }

}
