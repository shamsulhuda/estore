<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

    	$categories = Category::all();
    	$products = Product::orderBy('id', 'desc')->get();
    	$sliders = Slider::orderBy('id','desc')->get();

    	return view('welcome', compact('categories','products','sliders'));
    }

    public function productView(Request $request){

    	$product = Product::find($request->id);
    	return json_encode($product);
    }


    public function productDetails($id){
    	$product_details = Product::find($id);
    	return view('frontview.product_details', compact('product_details'));
    }
}
