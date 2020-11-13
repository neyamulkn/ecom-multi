<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Order;
use App\Models\Page;
use App\Models\PredefinedFeature;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductFeature;
use App\Models\ProductFeatureDetail;
use App\Models\ProductVariation;
use App\Models\ProductVariationDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    //get sub category by category
    public function get_subcategory($cat_id){
    	$subcategories = Category::where('parent_id', $cat_id)->get();
        $output = '';
        if(count($subcategories)>0){
            $output .= '<option value="">Select Subcategory</option>';
            foreach($subcategories as $subcategory){
                $output .='<option '. (old("subcategory") == $subcategory->id ? "selected" : "" ).' value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
            }
        }
        echo $output;
    }

    // get childcategory by category
    public function get_subchild_category($subcat_id){
    	$subchildcategories = Category::where('subcategory_id', $subcat_id)->get();
        $output = '';
        if(count($subchildcategories)>0){
            $output .= '<option value="">Select child category</option>';
            foreach($subchildcategories as $subchildcategory){
                $output .='<option '. (old("subcategory") == $subchildcategory->id ? "selected" : "" ).' value="'.$subchildcategory->id.'">'.$subchildcategory->name.'</option>';
            }
        }
        echo $output;
    }

    //get attribute by child category
    public function getAttributeByChildcategory($subcat_id){
    	$subchildcategories = Category::where('subcategory_id', $subcat_id)->get();
        $output = '';
        if(count($subchildcategories)>0){
            $output .= '<option value="">Select Subcategory</option>';
            foreach($subchildcategories as $subchildcategory){
                $output .='<option '. (old("subcategory") == $subchildcategory->id ? "selected" : "" ).' value="'.$subchildcategory->id.'">'.$subchildcategory->name.'</option>';
            }
        }
        echo $output;
    }

    // get attribute by category & sub category
    public function getAttributeByCategory($category_id){
    	$attributes = ProductAttribute::where('category_id', $category_id)->get();
    	$output = '';
    	if(count($attributes)>0){
    		$output = view('admin.product.attributedynamic-fields')->with(compact('attributes'));
    	}

    	echo $output;
    }

    // get city by state
    public function get_city($id=0){
        $cities = City::where('state_id', $id)->get();
        $output = '';
        if(count($cities)>0){
            $output .= '<option value="">Select city</option>';
            foreach($cities as $city){
                $output .='<option value="'.$city->id.'">'.$city->name.'</option>';
            }
        }
        echo $output;
    }

    // get area by city
    public function get_area($id=0){
        $areas = Area::where('city_id', $id)->get();
        $output = '';
        if(count($areas)>0){
            $output .= '<option value="">Select area</option>';
            foreach($areas as $area){
                $output .='<option '. (old("area") == $area->id ? "selected" : "" ).' value="'.$area->id.'">'.$area->name.'</option>';
            }
        }
        echo $output;
    }

    // check unique fielde
    public function checkField(Request $request){

        if($request->field == 'email' && !filter_var($request->value, FILTER_VALIDATE_EMAIL)){
            $output = [
                'status' => false,
                'msg' =>  $request->value ." is invalid email."
            ];
            return response()->json($output);
        }

        $check = DB::table($request->table)->where($request->field, $request->value)->first();
        if($check){
            $output = [
                'status' => false,
                'msg' =>  $request->field ." allready used."
            ];
        }else{
            $output = [
                'status' => true,
                'msg' =>  $request->field ." is available."
            ];
        }

        return response()->json($output);

    }


    public function getFeature($category_id){
        $getFeature = PredefinedFeature::where('category_id', $category_id)->get();

        $output = '';
        if(count($getFeature)>0){
            $output = '<div class="row">';
            foreach ($getFeature as $feature) {
                $output .=  '<div style="margin-bottom:10px;" class="col-4 col-sm-2 '.($feature->is_required == null ?: "required").' text-right col-form-label">'.$feature->name.'
                <input type="hidden" value="'.$feature->name.'" class="form-control"  name="features['.$feature->id.']"></div>
                <div class="col-8 col-sm-4">
                    <input type="text" '.($feature->is_required == null ?: "required").' name="featureValue['.$feature->id.']" class="form-control"  placeholder="Input value here">
                </div>';
            }
            $output .= '</div>';
        }
        echo $output;
    }

    // delete Variation
    public function deleteVariation($id)
    {
        $delete = ProductVariation::where('id', $id)->delete();
        if($delete){
            ProductVariationDetails::where('variation_id', $id)->delete();
            $output = [
                'status' => true,
                'msg' => 'Variation deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Variation cannot deleted.'
            ];
        }
        return response()->json($output);
    }

    // delete Data Common
    public function deleteDataCommon(Request $request)
    {
        $field = ($request->field) ? $request->field : 'id';
        $delete = $status = DB::table($request->table)->where($field, $request->id)->delete();
        if($delete){
            $output = [
                'status' => true,
                'msg' => 'Data deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Data cannot deleted.'
            ];
        }
        return response()->json($output);
    }


    public function getMenuSourch($type){
        $getSources = [];
        $output = '';
        if($type == 'category'){
            $categories = Category::where('parent_id', '!=', null)->where('subcategory_id', null)->where('status', 1)->get();
            if(count($categories)>0){
                foreach ($categories as $source) {
                    $output .= ' <option value="'.$source->id.'">'.$source->name.'</option>';
                    if(count($source->get_subcategory)>0){

                        foreach($source->get_subcategory as $childcategory){
                            $output .= '<option value="'.$childcategory->id.'">&nbsp;&nbsp;'.$childcategory->name.'</option>';

                        }
                    }
                }
            }
        }elseif($type == 'page'){
            $getSources = Page::where('status', 1)->get();
            if(count($getSources)>0){
                foreach ($getSources as $source) {
                    $output .= ' <option value="'.$source->id.'">'.$source->title.'</option>';
                }
            }
        }else{
            $output = '';
        }
        echo $output;
    }

    //get cart details in header
    public function getCartHead()
    {
        $user_id = 0;
        if(Auth::check()){
            $user_id = Auth::id();
        }else{
            $user_id = Session::get('user_id');
        }
        $getCart = Cart::where('user_id', $user_id)->get();

        if(count($getCart)>0){
            echo view('frontend.carts.cart-head')->with(compact('getCart'));
        }else{
            echo '<h4 style="color:red;text-align: center;padding: 0px">Your cart is empty.</h4>';
        }
    }

    //suggest search keywords
    public function search_keyword(Request $request){
        $get_keyord = Product::select('title')->where('title', 'LIKE', '%'. $request->q .'%')->get();
        $tags = array();
        foreach ($get_keyord as $value) {
            array_push($tags, $value->title);
        }
        echo json_encode($tags);
    }

    // Status change function
    public function satusActiveDeactive(Request $request){
        $status = DB::table($request->table)->where('id', $request->id)->first();
        $field =  ($request->field) ? $request->field : 'status';
        //check number(1) or string(active)
        $value_type =  is_numeric($status->status)  ? 1 : 'active';

        if(is_numeric($status->status)){
            $value =  ($status->$field == 1)  ? 0 : 1;
        }else{
            $value =  ($status->$field == 'active')  ? 'pending' : 'active';
        }
        if($status){
            if($status->$field == $value_type){
                DB::table($request->table)->where('id', $request->id)->update([$field => $value]);
            }else{
                DB::table($request->table)->where('id', $request->id)->update([$field => $value]);
            }
            $output = array( 'status' => true, 'message' => $field. ' update successful.');
        }else{
            $output = array( 'status' => false, 'message' => $field. ' can\'t update.!');
        }
        return response()->json($output);
    }
    // Status approve Unapprove function
    public function approveUnapprove(Request $request){
        $status = DB::table($request->table)->where('id', $request->id)->first();

        $field =  ($request->field) ? $request->field : 'status';
        //check number(1) or string(active)
        $value_type =  is_numeric($status->status)  ? 1 : 'active';

        if(is_numeric($status->status)){
            $value =  ($status->$field == 1)  ? 0 : 1;
        }else{
            $value =  ($status->$field == 'active')  ? 'unapprove' : 'active';
        }
        if($status){
            if($status->$field == $value_type){
                DB::table($request->table)->where('id', $request->id)->update([$field => $value]);
            }else{
                DB::table($request->table)->where('id', $request->id)->update([$field => $value]);
            }
            $output = array( 'status' => true, 'message' => ' Approve successful.');
        }else{
            $output = array( 'status' => false, 'message' => 'Sorry can\'t approve.!');
        }
        return response()->json($output);
    }

    // change Order Status function
    public function changeOrderStatus(Request $request){
        $status = Order::where('order_id', $request->id)->first();
        if($status){
            if($status->status == 1){
                DB::table($request->table)->where('id', $request->id)->update(['status' => 0]);
            }else{
                DB::table($request->table)->where('id', $request->id)->update(['status' => 1]);
            }
            $output = array( 'status' => true,  'message'  => 'Status update successful.');
        }else{
            $output = array( 'status' => false,  'message'  => 'Status can\'t update.!');
        }
        return response()->json($output);
    }

    //show order details by order id
    public function showOrderDetails($orderId){
        $order = Order::with(['order_details.product:id,title,slug,feature_image','get_country', 'get_state', 'get_city', 'get_area'])
            ->where('order_id', $orderId)->first();
        if($order){
            return view('inc.order-details')->with(compact('order'));
        }
        return false;
    }

    //position sorting
    public function positionSorting(Request $request){

        for($i=0; $i<count($request->ids); $i++)
        {
            $sorting = DB::table($request->table);
            if(isset($request->field)){
                $sorting->where($request->field, $request->value);
            }
            $sorting->where('id', str_replace('item', '', $request->ids[$i]))->update(['position' => $i]);
        }
        echo 'Position sorting has been updated';
    }

    //get products by anyone field
    public function getProductsByField (Request $request, $field){
        $output = '';
        $products = Product::where($field, $request->id)->where('status', 'active')->get();
        if(count($products)>0){
            $output .= ' <option value="">Select Product</option>';
            foreach ($products as $source) {
                $output .= ' <option value="'.$source->id.'">'.$source->title.'</option>';
            }
        }
        echo $output;
    }




}
