<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use App\Wishlist;
use Auth;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

        if (Auth::check()) {
            $userID = Auth::user()->id;
            $total_count = Wishlist::where('user_id', $userID)->count();
        }

        
    	$categories = Category::all();
    	$products = Product::orderBy('id', 'desc')->get();
    	$sliders = Slider::orderBy('id','desc')->get();

    	return view('welcome', compact('categories','products','sliders','total_count'));
    }

    public function productView(Request $request){

    	$product = Product::find($request->id);
    	return json_encode($product);
    }


    public function productDetails($id){
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $total_count = Wishlist::where('user_id', $userID)->count();
        }
    	$product_details = Product::find($id);
    	return view('frontview.product_details', compact('product_details','total_count'));
    }


    

}
