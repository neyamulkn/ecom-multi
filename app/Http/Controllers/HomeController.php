<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\HomepageSection;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductFeature;
use App\Models\ProductFeatureDetail;
use App\Models\Services;
use App\Models\Slider;
use App\Models\State;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{

    //home page
    public function index()
    {
        $data = [];
        $data['sections'] = HomepageSection::where('status', 1)->orderBy('position', 'asc')->get();
        $data['sliders'] = Slider::where('status', 1)->orderBy('position', 'asc')->get();


        $data['categories'] = Category::with('products')->where('parent_id', '=' , null)->where('popular', 1)->where('status', 1)->orderBy('orderBy', 'asc')->take(12)->get();
        $data['features'] = Product::where('featured', 1)->where('status', 1)->orderBy('id', 'desc')->get();
        $data['newArrivals'] = Product::where('status', 1)->orderBy('id', 'desc')->get();

        return view('frontend.home2')->with($data);
    }

    //product showby category
    public function category(Request $request)
    {

        $data['products'] = $data['specifications'] = $data['category'] = $data['filterCategories'] = $data['brands'] = [];

        try {
            $products = new Product();
            $specifications = ProductAttribute::orderBy('id', 'asc');
            if ($request->catslug) {
                $data['category'] = Category::where('slug', $request->catslug)->first();
                if($data['category']) {
                    $data['filterCategories'] = $data['category']->get_subcategory;
                    //get product attribute by category id
                    $specifications->orWhere('category_id', $data['category']->id);

                    //get product by category id
                    $products = $products->where('category_id', $data['category']->id);
                }
            }
            if (!$request->subslug && !$request->childslug && $request->catslug) {
                $specifications->orWhere('category_id', $data['category']->id)
                    ->orWhereIn('category_id', $data['filterCategories']->pluck('id'))
                    ->orWhereIn('category_id', $data['category']->get_subchild_category->pluck('id'));
            }
            if ($request->subslug) {
                $data['category'] = Category::where('slug', $request->subslug)->first();
                $data['filterCategories'] = $data['category']->get_subchild_category;
                //get product attribute by sub category id
                $specifications->orWhere('category_id', $data['category']->id);
                //get product by sub category id
                $products = $products->where('subcategory_id', $data['category']->id);
            }
            if ($request->childslug) {
                $data['category'] = Category::where('slug', $request->childslug)->first();
                $data['filterCategories'] = Category::where('subcategory_id', $data['category']->subcategory_id)->get();
                //get product attribute by child category id
                $specifications->orWhere('category_id', $data['category']->id);
                $products = $products->where('childcategory_id', $data['category']->id);
            }
            //check search keyword
            if ($request->q) {
                $products = $products->where('title', 'like', '%' . $request->q . '%');
            }

            //check ratting
            if ($request->ratting) {
                $products = $products->where('avg_ratting', $request->ratting);
            }

            //check brand
            if ($request->brand) {
                if (!is_array($request->brand)) { // direct url tags
                    $brand = explode(',', $request->brand);
                } else { // filter by ajax
                    $brand = implode(',', $request->brand);
                }
                $products = $products->whereIn('brand_id', $brand);
            }
            $field = 'id'; $value = 'desc';
            if (isset($request->sortby) && $request->sortby) {
                try {
                    $sort = explode('-', $request->sortby);
                    if ($sort[0] == 'name') {
                        $field = 'title';
                    } elseif ($sort[0] == 'price') {
                        $field = 'selling_price';
                    } elseif ($sort[0] == 'ratting') {
                        $field = 'avg_ratting';
                    } else {
                        $field = 'id';
                    }
                    $value = ($sort[1] == 'a' || $sort[1] == 'l') ? 'asc' : 'desc';
                    $products = $products->orderBy($field, $value);
                }catch (\Exception $exception){}
            }
            $products = $products->orderBy($field, $value);

            //check price keyword
            if ($request->price) {
                $price = explode(',', $request->price);
                $products = $products->whereBetween('selling_price', [$price[0], $price[1]]);
            }

            $data['specifications'] = $specifications->get();

            //check weather ajax request identify filter parameter

            foreach ($data['specifications'] as $filterAttr) {
                $filter = strtolower($filterAttr->name);
                if ($request->$filter) {
                    if (!is_array($request->$filter)) { // direct url tags
                        $tags = explode(',', $request->$filter);
                    } else { // filter by ajax
                        $tags = implode(',', $request->$filter);
                    }
                    //get product id from url filter id (size=1,2)
                    $productsFilter = ProductFeatureDetail::whereIn('attributeValue_id', $tags)->groupBy('product_id')->get()->pluck('product_id');

                    $products = $products->whereIn('id', $productsFilter);
                }
            }

            //check perPage
            $perPage = 15;
            if (isset($request->perPage) && $request->perPage) {
                $perPage = $request->perPage;
            }

            $data['products'] = $products->where('status', 1)->paginate($perPage);

        }catch (Exception $e){

        }


        if($request->filter){
            return view('frontend.products.filter_products')->with($data);
        }else{
            if($data['category']){
                $data['brands'] = Brand::where('category_id', $data['category']->id)->where('status', 1)->get();
            }
            return view('frontend.products.category')->with($data);
        }
    }
    //search products
    public function search(Request $request)
    {

        $search = Product::where('status', 1);
            if($request->q) {
                $search->where('title', 'like', '%' . $request->q . '%');
            }
            //check brand
            if ($request->brand) {
                if (!is_array($request->brand)) { // direct url tags
                    $brand = explode(',', $request->brand);
                } else { // filter by ajax
                    $brand = implode(',', $request->brand);
                }
                $search->whereIn('brand_id', $brand);
            }
            if ($request->cat){
                $search->join('categories', 'products.category_id', 'categories.id');
                $search->where('categories.slug', $request->cat);
            }
        $search = $search->first();
        $data['products'] = $data['specifications'] = $data['category'] = $data['filterCategories'] = $data['brands'] = [];
        //dd($get_products);
        if($search) {
            $products = new Product();
            $specifications = ProductAttribute::orderBy('id', 'asc');
            if ($search->category_id) {
                $data['category'] = Category::where('id', $search->category_id)->first();
                $data['filterCategories'] = $data['category']->get_subcategory;
                //get product attribute by category id
                $specifications->where('category_id', $data['category']->id);

                //get product by category id
                $products = $products->where('category_id', $data['category']->id);
            }
            if (!$search->childcategory_id && !$search->subcategory_id && $search->category_id) {
                $specifications->orWhere('category_id', $data['category']->id)
                    ->orWhereIn('category_id', $data['filterCategories']->pluck('id'))
                    ->orWhereIn('category_id', $data['category']->get_subchild_category->pluck('id'));
            }
            if ($search->subcategory_id) {
                $data['category'] = Category::where('id', $search->subcategory_id)->first();
                $data['filterCategories'] = $data['category']->get_subchild_category;
                //get product attribute by sub category id
                $specifications->where('category_id', $data['category']->id);
                //get product by sub category id
                $products = $products->where('subcategory_id', $data['category']->id);
            }
            if ($search->childcategory_id) {
                $data['category'] = Category::where('id', $search->childcategory_id)->first();
                $data['filterCategories'] = Category::where('subcategory_id', $data['category']->subcategory_id)->get();
                //get product attribute by child category id
                $specifications->where('category_id', $data['category']->id);
                $products = $products->where('childcategory_id', $data['category']->id);
            }
            //check search keyword
            if ($request->q) {
                $products = $products->where('title', 'like', '%' . $request->q . '%');
            }

            //check ratting
            if ($request->ratting) {
                $products = $products->where('avg_ratting', $request->ratting);
            }

            //check orderby
            if (isset($request->sortby) && $request->sortby) {
                try {
                    $sort = explode('-', $request->sortby);
                    if ($sort[0] == 'name') {
                        $field = 'title';
                    } elseif ($sort[0] == 'price') {
                        $field = 'selling_price';
                    } elseif ($sort[0] == 'ratting') {
                        $field = 'avg_ratting';
                    } else {
                        $field = 'id';
                    }
                    $value = (($sort[1] == 'a' || $sort[1] == 'l')) ? 'asc' : 'desc';

                    $products = $products->orderBy($field, $value);
                }catch (Exception $exception){}
            }

            //check price keyword
            if ($request->price) {
                $price = explode(',', $request->price);
                $products = $products->whereBetween('selling_price', [$price[0], $price[1]]);
            }

            $data['specifications'] = $specifications->get();

            //check weather ajax request identify filter parameter

            foreach ($data['specifications'] as $filterAttr) {
                $filter = strtolower($filterAttr->name);
                if ($request->$filter) {
                    if (!is_array($request->$filter)) { // direct url tags
                        $tags = explode(',', $request->$filter);
                    } else { // filter by ajax
                        $tags = implode(',', $request->$filter);
                    }
                    //get product id from url filter id (size=1,2)
                    $productsFilter = ProductFeatureDetail::whereIn('attributeValue_id', $tags)->groupBy('product_id')->get()->pluck('product_id');

                    $products = $products->whereIn('id', $productsFilter);
                }
            }
            //check perPage
            $perPage = 15;
            if (isset($request->perPage) && $request->perPage) {
                $perPage = $request->perPage;
            }
            $data['products'] = $products->paginate($perPage);
            $data['brands'] = Brand::where('category_id', $data['category']->id)->where('status', 1)->get();
        }
        if($request->filter){
            return view('frontend.products.filter_products')->with($data);
        }else{
            return view('frontend.products.search_products')->with($data);
        }
    }

    //disply product details by product id/slug
    public function product_details($slug)
    {
        $data['product'] = Product::with('user:id,name','get_category:id,name','get_features')->where('slug', $slug)->where('status', 1)->first();

        if($data['product']) {
            $data['product']->increment('views'); // news view count
            $data['related_products'] = Product::where('category_id', $data['product']->category_id)->where('id', '!=', $data['product']->id)->where('status', 1)->take(8)->get();

            return view('frontend.products.product_details')->with($data);
        }else{
            return view('404');
        }
    }

    // apply coupon code in cart & checkout page
    public function couponApply(Request $request){
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
        if(!$coupon){
            return response()->json(['status' => false, 'msg' => 'This coupon does not exists.']);
        }else{

            if($coupon->status == 0)
            {
                return response()->json(['status' => false, 'msg' => 'This coupon is not active.']);
            }

            if($coupon->times != null)
            {
                if($coupon->times == "0")
                {
                    return response()->json(['status' => false, 'msg' => 'Coupon usage limit has been reached.']);
                }
            }

            $today = Carbon::parse(now())->format('d-m-Y');
            $from = Carbon::parse($coupon->start_date)->format('d-m-Y');
            $to = Carbon::parse($coupon->expired_date)->format('d-m-Y');

            if($today < $from )
            {
                return response()->json(['status' => false, 'msg' => 'This coupon is running from: '.$from]);
            }if( $to < $today )
            {
                return response()->json(['status' => false, 'msg' => 'This coupon is expired.']);
            }
            $user_id = 0;
            if(Auth::check()){
                $user_id = Auth::id();
            }else{
                if(Session::has('user_id')){
                    $user_id =  Session::get('user_id');
                }
            }
            $cartItems = Cart::join('products', 'carts.product_id', 'products.id')->where('user_id', $user_id);
            //check direct checkout
            if(Session::has('direct_checkout_product_id')){
                $cartItems = $cartItems->where('product_id', Session::get('direct_checkout_product_id'));
            }
            $cartItems = $cartItems->selectRaw('sum(qty*price) total_price, shipping_method, ship_region_id, shipping_cost, other_region_cost')->groupBy('product_id')->get();
            $total_shipping_cost = 0;
            $total_amount = array_sum(array_column($cartItems->toArray(), 'total_price'));
            $total_shipping_cost = array_sum(array_column($cartItems->toArray(), 'shipping_cost'));

            //if shipping region set
            if(Session::has('ship_region_id')){
                $total_shipping_cost = 0; //set zero
                foreach($cartItems as $item) {
                    $shipping_cost = $item->shipping_cost;
                    //check shipping method
                    if($item->shipping_method == 'location'){
                        if ($item->ship_region_id !=  Session::get('ship_region_id')) {
                            $shipping_cost = $item->other_region_cost;
                        }
                    }
                    $total_shipping_cost += $shipping_cost;
                }
            }

            if($coupon->type == 0)
            {
                $couponAmount = round($total_amount * ($coupon->amount/100), 2);
                Session::put('couponType', '%');
                Session::put('couponAmount', round(($coupon->amount/100),2));
            }else{
                $couponAmount = $coupon->amount;
                Session::put('couponType', 'fixed');
                Session::put('couponAmount', $coupon->amount);
            }

            if(Session::get('couponCode') == $request->coupon_code){
                return response()->json(['status' => false, 'msg' => 'This coupon is already used.']);
            }
            //set coupon code
            Session::put('couponCode', $request->coupon_code);
            $grandTotal = ($total_amount + $total_shipping_cost) - $couponAmount;
            return response()->json(['status' => true, 'couponAmount' => $couponAmount, 'grandTotal' => $grandTotal, 'msg' => 'Coupon code successfully applied. You are available discount.']);

        }
    }

    public function buyDirect(Request $request)
    {
        $product = Product::find($request->product_id);
        $qty = 0;

        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            if(Session::has('user_id')){
                $user_id =  Session::get('user_id');
            }else{
                $user_id =  Session::put('user_id', rand(1000000000, 9999999999));
            }
        }
        setcookie('user_id', $user_id, time() + (86400), "/"); // 86400 = 1 day
        $cart_user = Cart::where('product_id', $product->id)->where('user_id', $user_id)->first();
        if($cart_user  && !$request->quantity){
            $qty = 1;
        }else{
            $qty = $request->quantity;
        }
        //check quantity
        if($qty > $product->stock) {
            $output = array(
                'status' => 'error',
                'msg' => 'Out of stock'
            );
            return $output;
        }

        $attributes = $request->except(['product_id', 'quantity', 'buyDirect']);
        $attributes = json_encode($attributes);

        if($cart_user){
            $data = ['qty' => (isset($request->quantity)) ? $request->quantity : 1];
            //check attributes set or not
            if($request->quantity){
                $data = array_merge(['attributes' => $attributes], $data);
            }
            $cart_user->update($data);
        }else{
            //check weather have discount
            if ($product->discount) {
                $price = $product->selling_price - ($product->discount * $product->selling_price) / 100;
            } else {
                $price = $product->selling_price;
            }
            $data = [
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'title' => $product->title,
                'slug' => $product->slug,
                'image' => $product->feature_image,
                'qty' => (isset($request->quantity)) ? $request->quantity : 1,
                'price' => $price,
                'attributes' => $attributes,
            ];
            $cart_user = Cart::create($data);
        }
        //cookie set & retrive;
        setcookie('direct_checkout_product_id', $cart_user->product_id, time() + (86400), "/"); // 86400 = 1 day
//      Session::has('direct_checkout_product_id') ? Session::get('direct_checkout_product_id') : '';
        Session::put('direct_checkout_product_id' , $cart_user->product_id);
        $output = array(
            'status' => 'success',
            'buy_product_id' => $cart_user->product_id
        );

        return response()->json($output);
    }

    public function moreProducts($slug)
    {
        $data['section'] = HomepageSection::where('slug', $slug)->where('status', 1)->first();
        if($data['section']){
            $data['products'] = Product::whereIn('id', explode(',', $data['section']->product_id))->orderBy('id', 'desc')->paginate(15);
            return view('frontend.homepage.moreProducts')->with($data);
        }
        return view('frontend.404');
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 1)->first();
        if($page){
            return view('frontend.page')->with(compact('page'));
        }
        return view('frontend.404');
    }

    public function quickview($product_id){
        $data['product'] = Product::with('user:id,name','get_category:id,name','get_features')->where('id', $product_id)->first();

        if($data['product']) {
            $data['product']->increment('views'); // news view count
            return view('frontend.products.quickview')->with($data);
        }else{
            return view('frontend.404');
        }
    }
}
