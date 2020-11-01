<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function dashboard(){
        $data= [];

        $data['newUser'] = User::where('created_at', '>=', \Carbon\Carbon::today()->subDays(7))->count();
        $data['allUser'] = User::count();
        $data['allSeller'] = Vendor::count();
        $data['pendingSeller'] = Vendor::where('status', 'pending')->count();

        $data['allProducts'] = Product::count();
        $data['pendingProducts'] = Product::where('status', 'pending')->count();
        $data['outOfStock'] = Product::where('stock', '<=', 0)->count();
        $data['rejectProducts'] = Product::where('status', 'reject')->count();
        $data['allOrders'] = Order::count();
        $data['pendingOrders'] = Order::where('order_status', 'pending')->count();
        $data['completeOrders'] = Order::where('order_status', 'complete')->count();
        $data['rejectOrders'] = Order::where('order_status', 'complete')->count();
        $data['categories'] = Category::count();
        $data['brands'] = Brand::count();

        return view('admin.dashboard')->with($data);

    }
}
