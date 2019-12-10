<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Alert;
use Illuminate\Support\Carbon;
use App\User;
use App\Wishlist;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_info = User::where('id', Auth::user()->id)->first();
        $wishlist_items = Wishlist::where('user_id', Auth::user()->id)->get();
        
        return view('layouts.partial.user_profile', compact('user_info','wishlist_items'));
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
        //
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

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'avatar'=> 'mimes:jpg,jpeg,png,bmp,gif',
            'phone_no'=> 'required',
            'shipping_address'=>'required'
        ]);

        $user_info = User::find($id);

        $avatar = $request->file('avatar');

        $slug = str_slug($request->name);

        if (isset($avatar)) {
            $pre_avatar = public_path("uploads/users/avatar/{$user_info->avatar}");

            if (file_exists($pre_avatar)) {
                unlink($pre_avatar);
            }

            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$avatar->getClientOriginalExtension();

            if (!file_exists("uploads/users/avatar")) {
                mkdir("uploads/users/avatar", 0777, true);
            }

            $avatar->move("uploads/users/avatar/", $imagename);

        }else{
            $imagename = $user_info->avatar;
        }

        $user_info->name = $request->name;
        $user_info->email = $request->email;
        $user_info->phone_no = $request->phone_no;
        $user_info->street_address = $request->street_address;
        $user_info->shipping_address = $request->shipping_address;
        $user_info->avatar = $imagename;
        
        $user_info->save();

        toast('Your information updated successfully!','success');
        return redirect()->back();
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
