<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomepageSection;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomepageSectionController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where('parent_id', null)->orderBy('name', 'asc')->get();
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
        $section->type = 'product';
        $section->product_id =  implode(',', $request->product_id);
        $section->status = ($request->status ? 1 : 0);
        $store = $section->save();
        if($store){
            Toastr::success('Homepage section created successfully.');
        }else{
            Toastr::error('HomepageS section cann\' created.');
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
    public function destroy(HomepageSection $HomepageSection)
    {
        //
    }

    public function getAllProducts (Request $request){
        $output = '';
        $products = Product::where('category_id', $request->id)->where('status', 1)->get();
        if(count($products)>0){
            foreach ($products as $source) {
                $output .= ' <option value="'.$source->id.'">'.$source->title.'</option>';
            }
        }
        echo $output;
    }

    public function getSingleProduct (Request $request){
        $output = '';
        $products = Product::where('id', $request->id)->where('status', 1)->get();
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
