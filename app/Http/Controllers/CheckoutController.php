<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderedproduct;
use App\Wishlist;
use App\Setting;
use App\Payment;
use App\Order;
use Cart;
use Alert;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $total_count = Wishlist::where('user_id', $userId)->count();
        }
        $shipping_cost = Setting::first()->shipping_cost;
        $payments = Payment::orderBy('priority', 'ASC')->get();
        return view('frontview.checkout', compact('total_count','shipping_cost','payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required',
            'phone_no'=> 'required',
            'shipping_address'=> 'required',
            'payment_method_id'=> 'required'
        ]);

        $order = new Order();

        // check transaction ID given or not
        if ($request->payment_method_id !== 'cash_on') {
            if ($request->transaction_id == NULL || empty($request->transaction_id)) {
                
                toast('Woops! transaction ID required!', 'info');
                return back();
            }
        }

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_no = $request->phone_no;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->transaction_id = $request->transaction_id;
        $order->user_id = Auth::id();
        $order->ip_address = request()->ip();


        $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;

        $order->save();

        //Here insert data into Orderdproduct

        // $cart = new Orderedproduct();
        // foreach (Cart::content() as $item) {
        //     $cart->order_id = Order::get('id')->where('user_id', Auth::id());
        //     $cart->product_id = $item->id;
        //     $cart->quantity = $item->qty;
        // }

        foreach (Cart::content() as $item) {
            $data = Orderedproduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
            ]);

        }

        // $cart->save();

        Cart::instance('default')->destroy();
        // clear Cart

        toast('Your order is submited!', 'success');
        return redirect()->route('frontend');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
