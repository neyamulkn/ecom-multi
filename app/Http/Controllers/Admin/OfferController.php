<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\Product;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class OfferController extends Controller
{
    use CreateSlug;
    public function index()
    {
        $data['categories'] = Category::where('parent_id', null)->orderBy('orderBy', 'asc')->get();
        $data['brands'] = Brand::orderBy('name', 'asc')->get();
        $data['offers'] = Offer::orderBy('start_date', 'asc')->get();
        return view('admin.offer.index')->with($data);
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

        $offer = new Offer();
        $offer->title = $request->title;
        $offer->slug = ($request->link) ? $request->link : $this->createSlug('offers', $request->title);
        $offer->start_date = $request->start_date;
        $offer->end_date = $request->end_date;
        $offer->background_color = $request->background_color;
        $offer->text_color = $request->text_color;
        $offer->notes = $request->details;

        $offer->status = ($request->status ? 1 : 0);
        //if feature image set
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $new_image_name = $this->uniqueImagePath('offers', 'thumbnail', $image->getClientOriginalName());

            $image_path = public_path('upload/images/offer/thumbnail/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(250, 250);
            $image_resize->save($image_path);
            $offer->thumbnail = $new_image_name;
        }
        //if feature image set
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $new_image_name = $this->uniqueImagePath('offers', 'banner', $image->getClientOriginalName());

            $image_path = public_path('upload/images/offer/banner/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(1400, 400);
            $image_resize->save($image_path);
            $offer->banner = $new_image_name;
        }
        $store = $offer->save();
        if($store){
            foreach ($request->product_id as $product){
                OfferProduct::create([
                    'offer_id' => $offer->id,
                    'product_id' => $product,
                    'offer_discount' => ($request->discount[$product]) ? $request->discount[$product] : null,
                    'discount_type' => $request->discount_type[$product]
                ]);
            }
            Toastr::success('Offer created successfully.');
        }else{
            Toastr::error('Offer cann\' created.');
        }
        return back();
    }

    public function delete($id)
    {
        $offer = Offer::find($id);

        if($offer){
            //delete offer
            $offer->delete();
            //delete offer product
            OfferProduct::where('offer_id', $offer->id)->delete();

            $banner = public_path('upload/images/offer/banner/' . $offer->banner);
            $thumbnail = public_path('upload/images/offer/thumbnail/' . $offer->thumbnail);

            if(file_exists($thumbnail) && $offer->thumbnail){
                unlink($thumbnail);
            }if(file_exists($banner) && $offer->banner){
                unlink($banner);
            }
            $output = [
                'status' => true,
                'msg' => 'Offer deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Offer cannot deleted.'
            ];
        }
        return response()->json($output);
    }

    //get all products by anyone field
    public function getAllProducts (Request $request){
        $output = '';
        $products = Product::where('status', 'active');
            if($request->brand !=  'all'){
                $products->where('brand_id', $request->brand);
            }
            if($request->category != 'all'){
                $products->where('category_id', $request->category);
            }
            $allproducts = $products->get();
        if(count($allproducts)>0){
            $output .= ' <option value="">Select Product</option>';
            foreach ($allproducts as $source) {
                $output .= ' <option value="'.$source->id.'">'.$source->title.'</option>';
            }
        }
        echo $output;
    }

    public function getSingleProduct (Request $request){
        $output = '';
        $product = Product::where('id', $request->id)->where('status', 'active')->first();
        //$productIds = Session::has('productIds') ? Session::get('productIds') : [];

//        if(in_array($request->id, $productIds)){
//            return  $output = [
//                'status' => false,
//                'msg' => 'Product Already Added.!'
//            ];
//        }

        if($product){
            //session()->push('productIds',  $request->id);
            $output .= '<tr id="product' . $product->id . '">
                    <td>' . $product->title . ' <input type="hidden" name="product_id[' . $product->id . ']" value="' . $product->id . '"></td>
                    <td>' . $product->selling_price . '</td>
                    <td><input type="text" name="discount[' . $product->id . ']" value="' . $product->discount . '"></td>
                    <td><select name="discount_type[' . $product->id . ']">
                        <option value="'.Config::get('siteSetting.currency_symble').'">Fixed</option>
                        <option selected value="%">Percentage</option>
                    </select></td>
                    <td><button type="button" title="Remove" onclick="remove_product(' . $product->id . ')" class="btn btn-danger"> <i class="fa fa-times"></button></td>
                </tr>';
            return  $output = [
                'status' => true,
                'msg' =>  $output
            ];
        }
        return  $output;
    }

}
