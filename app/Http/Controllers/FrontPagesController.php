<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class FrontPagesController extends Controller
{
    // all custom page display in
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 1)->first();
        if($page){
            $slug = ($page->is_default == 1) ? $page->slug : 'page';
            return view('frontend.pages.'.$slug)->with(compact('page'));
        }
        return view('404');
    }


    // today deals
    public function todayDeals()
    {
        $data['products'] = Product::orderBy('id', 'desc')->where('status', 'active')->paginate(20);
        if($data['products']){
            $data['sliders'] = Slider::where('type', 'today-deal')->where('status', 1)->get();
            return view('frontend.pages.today-deals')->with($data);
        }
        return view('404');
    }

    // get mega discount
    public function megaDiscount ()
    {
        $data['products'] = Product::where('discount', '!=', null)->where('status', 'active')->paginate(20);
        if($data['products']){
            $data['sliders'] = Slider::where('type', 'mega-discount')->where('status', 1)->get();
            return view('frontend.pages.mega-discount')->with($data);
        }
        return view('404');
    }

    // get top brand
    public function topBrand ()
    {
        $data['brands'] = Brand::where('brands.top', 1)
            ->leftJoin('products', 'products.brand_id', 'brands.id')
            ->leftJoin('order_details', 'products.id', 'order_details.product_id')
            ->where('brands.status', 1)
            ->selectRaw('brands.*, count(order_details.product_id)  as total_order')
            ->groupBy('brands.id')
            ->orderBy('total_order', 'desc')
            ->paginate(20);

        if($data['brands']){
            $data['sliders'] = Slider::where('type', 'brand')->where('status', 1)->get();
            return view('frontend.pages.top-brand')->with($data);
        }
        return view('404');
    }


}
