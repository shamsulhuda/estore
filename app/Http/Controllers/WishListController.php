<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\User;
use DB;

class WishListController extends Controller
{
    public function index(){
    	return view('frontview.wishlist');
    }

    public function add_wishitem(Request $request){

    	$wishlist = new Wishlist();

// First need to checkout the table if product already exists or not
    	$data_check = Wishlist::where('user_id', $request->userId)
    						->where('product_id', $request->id)->count();
    	if ($data_check > 0) {

    		return response()->json($data_check);

    	}else{

			$wishlist->product_id = $request->id;
	    	$wishlist->user_id = $request->userId;

	    	$wishlist->save();


	    	return response()->json(['status'=> 'successfully add to wishlist']);
	    }
    	

    }
}
