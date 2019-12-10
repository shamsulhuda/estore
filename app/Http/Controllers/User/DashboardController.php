<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class DashboardController extends Controller
{
    public function index(){

    	$user_info = User::where('id', Auth::user()->id)->first();
    	return view('user.dashboard',compact('user_info'));
    }
}
