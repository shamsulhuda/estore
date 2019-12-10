<?php

namespace App\Http\Controllers;

use Cart;
use App\Wishlist;
use App\Setting;
use Auth;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $total_count = Wishlist::where('user_id', $userId)->count();
        }
        $shipping_cost = Setting::first()->shipping_cost;
    	return view('frontview.cart',compact('total_count','shipping_cost'));
    }

    public function addCart($id){

    	$products = DB::table('products')->where('id', $id)->first();

    	$actual_price = $products->price;
    	$discount = $products->discount;
    	$selling_price = $actual_price - ($actual_price * ($discount/100));

    	$data = array();
    	$data['id'] = $products->id;
    	$data['name'] = $products->product_name;
    	$data['qty'] = 1;
    	$data['price'] = $selling_price;
    	$data['weight'] = 1;
    	$data['options']['image'] = $products->image;

    	Cart::add($data);

        return json_encode(['status'=>'success', 'totalItems' => Cart::count(), 'dataItems'=> Cart::content()]);
    	
    }

    // public function check(){
    // 	$contents = Wishlist::content();
    // 	return response()->json($contents);
    // }

    public function destroy($id){

    	Cart::remove($id);
    }
}
