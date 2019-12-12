<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use App\User;
class DashboardController extends Controller
{
    public function index(){
    	
    	$total_order_count = Order::count();
    	$pending_order = Order::get()->where('is_completed', 0)->count();
    	$completed_order = Order::get()->where('is_completed', 1)->count();
    	$total_customers = User::count();

    	return view('admin.dashboard', compact(
    		'total_order_count',
    		'pending_order',
    		'completed_order',
    		'total_customers'
    	));
    }
}
