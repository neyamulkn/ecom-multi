<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\Product;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    //display all offers
    public function offers(){
        $data['offers'] = Offer::with('offer_products.product:id,title,slug,selling_price,stock,feature_image')->where('status', 1)->get();
        $data['sliders'] = Slider::where('type', 'offer')->where('status', 1)->get();

        return view('frontend.offer.offers')->with($data);
    }

    //view offer details by offer slug
    public function offerDetails($slug){
        $data['offer'] = Offer::where('slug', $slug)->first();
        if($data['offer']) {
            //set offer id in session for offer identify
            Session::put('offerId', $data['offer']->id);
            $data['products'] = Product::join('offer_products', 'products.id', 'offer_products.product_id')
                ->where('offer_id', $data['offer']->id)
                ->inRandomOrder()
                ->selectRaw('offer_discount, discount_type, offer_id, products.id,title,slug,selling_price,stock,feature_image')
                ->groupBy('offer_products.id')
                ->paginate(20);
            return view('frontend.offer.offers-details')->with($data);
        }
        return view('404');
    }

    //calculate product discount
    public static function discount($product_id, $offer_id='', $offerPage=''){
        $offer_id = ($offer_id) ? $offer_id : Session::get('offerId');
        //check weather offer active or deactive
        $offer = Offer::where('id', $offer_id);
        //view discount only offer page
        if(!$offerPage){
            $offer->where('start_date', '<=', Carbon::now())->where('end_date', '>=', Carbon::now());
        }
        $offer = $offer->where('status', 1)->first();

        $output = null;

        if($offer) {
            //check offer discount product
            $product = OfferProduct::join('products', 'offer_products.product_id', 'products.id')
                ->selectRaw('selling_price, discount, offer_discount, discount_type')
                ->where('offer_id', $offer_id)->where('product_id', $product_id)->first();

            if($product) {
                if ($product->discount_type == '%') {
                    $discount = $product->selling_price - ($product->offer_discount * $product->selling_price) / 100;
                    $output = [
                        'discount_price' => $discount,
                        'discount' => $product->offer_discount,
                        'discount_type' => '%'
                    ];
                } else {
                    $discount = $product->selling_price - $product->offer_discount;
                    $output = [
                        'discount_price' => $discount,
                        'discount' => $product->offer_discount,
                        'discount_type' => Config::get('siteSetting.currency_symble')
                    ];
                }
            }
        }else{
            //product default discount
            $product = Product::where('discount', '!=', null)->where('id', $product_id)->first();
            if($product){
                $discount = $product->selling_price - ($product->discount * $product->selling_price) / 100;
                $output = [
                    'discount_price' => $discount,
                    'discount' => $product->discount,
                    'discount_type' => '%'
                ];
            }
        }
        return $output;

    }
}
