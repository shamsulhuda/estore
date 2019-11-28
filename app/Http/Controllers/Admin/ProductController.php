<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Product;
use App\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'=> 'required',
            'category_id'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
            'image'=> 'required|mimes:jpg,png,jpeg,gif'
        ]);

        $image = $request->file('image');

        $slug = str_slug($request->product_name);

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/products')) {
                mkdir('uploads/products', 0777, true);
            }
            $image->move('uploads/products', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->size = $request->size;
        $product->description = $request->description;
        $product->image = $imagename;

        $product->save();

        toast('Product store successfully!', 'success');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name'=> 'required',
            'category_id'=> 'required',
            'price'=> 'required',
            'size'=>'required',
            'description'=> 'required',
            'image'=> 'mimes:jpg,png,jpeg,gif'
        ]);
        $product = Product::find($id);

        $image = $request->file('image');

        $slug = str_slug($request->product_name);

        if (isset($image)) {

            $preImage = public_path("uploads/products/{$product->image}");

            if (file_exists($preImage)) {
                unlink($preImage);
            }
            
            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/products')) {
                mkdir('uploads/products', 0777, true);
            }
            $image->move('uploads/products', $imagename);
        }else{
            $imagename = $product->image;
        }


        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->size = $request->size;
        $product->description = $request->description;
        $product->image = $imagename;

        $product->save();

        toast('Product Updated successfully!', 'success');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $preImage = public_path("uploads/products/{$product->image}");

        if (file_exists($preImage)) {
            unlink($preImage);
        }

        $product->delete();

        toast('Product Deleted successfully!', 'success');
        return redirect()->back();

    }
}
