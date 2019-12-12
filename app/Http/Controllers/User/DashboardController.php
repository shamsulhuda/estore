<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Wishlist;
use App\Order;
use Auth;

class DashboardController extends Controller
{
    public function index(){

    	$user_info = User::where('id', Auth::user()->id)->first();
    	$wishlist = Wishlist::where('user_id', Auth::user()->id)->count();
    	$success_orders = Order::where('user_id', Auth::user()->id)
    				->Where('is_completed',1)
    				->count();
    	$pending_orders = Order::where('user_id', Auth::user()->id)
    				->Where('is_completed',0)
    				->count();

    	return view('user.dashboard',compact(
    		'user_info',
    		'wishlist',
    		'success_orders',
    		'pending_orders'
    	));
    }
}
