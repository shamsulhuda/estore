<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\User;
use Auth;
use DB;

class WishListController extends Controller
{
    public function index(){

    	$userID = Auth::user()->id;

    	if (Auth::check()) {
            $userId = Auth::user()->id;
            $total_count = Wishlist::where('user_id', $userId)->count();
        }

    	$wishlist_data = Wishlist::where('user_id', $userID)->get();

    	return view('frontview.wishlist', compact('wishlist_data','total_count'));
    }

    public function add_wishitem(Request $request){

    	$wishlist = new Wishlist();

		// total data for each user
    	$total_data = Wishlist::where('user_id', $request->userId)->count();

		// First need to checkout the table if product already exists or not
    	$data_check = Wishlist::where('user_id', $request->userId)
    						->where('product_id', $request->id)->count();
    	if ($data_check > 0) {

    		return response()->json($data_check);

    	}else{

			$wishlist->product_id = $request->id;
	    	$wishlist->user_id = $request->userId;

	    	$wishlist->save();


	    	return json_encode(['status'=> 'successfully add to wishlist', 'total_wish'=>$total_data]);
	    }
    	

    }


    public function removeItem($id){

    	$wishItem = Wishlist::find($id);

    	$wishItem->delete();

    	return response()->json(["status"=>"Item <strong>Deleted</strong> Successfully!"]);

    }
}
