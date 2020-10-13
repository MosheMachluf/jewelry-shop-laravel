<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Category;
use App\User;
use Carbon\Carbon;
use DB;

class CmsController extends MainController {


    public function dashboard(){
        $data = [
            'today_products' => Product::whereDate('created_at', Carbon::today())->count(),
            'total_products' => Product::count(),
            'today_categories' => Category::whereDate('created_at', Carbon::today())->count(),
            'total_categories' => Category::count(),
            'today_orders' => Order::whereDate('created_at', Carbon::today())->count(),
            'total_orders' => Order::all()->count(),
            'today_users' => User::whereDate('created_at', Carbon::today())->count(),
            'total_users' => User::all()->count(),
        ];
        self::$data = $data;
        return view('cms.dashboard', self::$data);
    }

    public function orders(){
        self::$data['orders'] = Order::getOrders();
        return view('cms.orders', self::$data);
    }
}