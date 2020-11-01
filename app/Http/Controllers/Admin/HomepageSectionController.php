<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\HomepageSection;
use App\Models\Product;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomepageSectionController extends Controller
{
    use CreateSlug;
    public function index()
    {
        $data['categories'] = Category::where('parent_id', null)->orderBy('name', 'asc')->get();
        $data['banners'] = Banner::orderBy('position', 'asc')->where('status', 1)->get();
        $data['homepageSections'] = HomepageSection::orderBy('position', 'asc')->get();
        return view('admin.homepage.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $section = new HomepageSection();
        $section->title = $request->title;
        $section->slug = $this->createSlug('homepage_sections', $request->title);
        $section->type = $request->section_type;
        $section->background_color = $request->background_color;
        $section->text_color = $request->text_color;
        $section->product_id =  ($request->section_type == 'section' ?  implode(',', $request->product_id) : $request->product_id);
        $section->status = ($request->status ? 1 : 0);
        $store = $section->save();
        if($store){
            Toastr::success('Homepage section added successfully.');
        }else{
            Toastr::error('Homepage section cann\'t added.');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomepageSection  $HomepageSection
     * @return \Illuminate\Http\Response
     */
    public function show(HomepageSection $HomepageSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomepageSection  $HomepageSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HomepageSection $HomepageSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomepageSection  $HomepageSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomepageSection $HomepageSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomepageSection  $HomepageSection
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $section = HomepageSection::find($id);

        if($section){
            $section->delete();
            $output = [
                'status' => true,
                'msg' => 'Home section deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Home section cannot deleted.'
            ];
        }
        return response()->json($output);
    }
//
//    public function getAllProducts (Request $request){
//        $output = '';
//        $products = Product::where('category_id', $request->id)->where('status', 'active')->get();
//        if(count($products)>0){
//            foreach ($products as $source) {
//                $output .= ' <option value="'.$source->id.'">'.$source->title.'</option>';
//            }
//        }
//        echo $output;
//    }

    public function getSingleProduct (Request $request){
        $output = '';
        $products = Product::where('id', $request->id)->where('status', 'active')->get();
        if(count($products)>0){
            foreach ($products as $source) {
                $output .= ' <option selected value="'.$source->id.'">'.$source->title.'</option>';
            }
        }
        echo $output;
    }

    public function HomepageSectionSorting (Request $request){
        for($i=0; $i<count($request->sectionIds); $i++)
        {
            HomepageSection::where('id', str_replace('item', '', $request->sectionIds[$i]))->update(['position' => $i]);
        }
        echo 'Section Order has been updated';
    }
}
