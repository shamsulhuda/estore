<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Alert;
use App\Order;
use App\Setting;
use App\Orderedproduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
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
    public function order_status($id)
    {
        $status = Order::find($id);

        if ($status->is_completed !== 1) {
            $status->is_completed = 1;
            $status->save();

            toast('Order mark as completed!', 'success');
            return redirect()->back();
        }elseif ($status->is_completed !== NULL) {
            $status->is_completed = 0;
            $status->save();

            toast('Order mark as not completed!', 'success');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $orders  = Orderedproduct::where('order_id', $id)->get();

        $order_info = Order::where('id', $id)->first();
        $setting = Setting::first();

        return view('admin.orders.invoice', compact('orders','order_info', 'setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $order = Order::find($id);

        if ($order->is_seen_by_admin !== 1) {

            $order->is_seen_by_admin = 1;
            $order->save();
        }
        

        $orders  = Orderedproduct::where('order_id', $id)->get();

        $order_info = Order::where('id', $id)->first();
        $setting = Setting::first();

        return view('admin.orders.order_details', compact('orders','order_info', 'setting'));
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
