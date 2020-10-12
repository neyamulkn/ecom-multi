<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function dashboard(){

        $data= [];
        $data['products'] = Product::count();
        $data['orders'] = Order::count();
        $data['pendinOorders'] = Order::where('order_status', 'pending')->count();
        $data['categories'] = Category::count();
        $data['brands'] = Brand::count();

        return view('admin.dashboard')->with($data);

    }
}
