<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Slider;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title'=> 'required',
            'image'=> 'required|mimes:jpg,jpeg,gif,png,bmp'
        ]);

        $image = $request->file('image');

        $slug = str_slug($request->title);

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider', 0777, true);
            }
            $image->move('uploads/slider/', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $slider = new Slider();

        $slider->title = $request->title;
        $slider->image = $imagename;
        $slider->save();

        toast('Slider Added successfully!', 'success');
        return redirect()->route('slider.index');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
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
            'title'=> 'required',
            'image'=> 'mimes:jpg,jpeg,gif,png,bmp'
        ]);

        $slider = Slider::find($id);

        $image = $request->file('image');

        $slug = str_slug($request->title);

        if (isset($image)) {

            $preImg = public_path("uploads/slider/{$slider->image}");

            if (file_exists($preImg)) {
                unlink($preImg);
            }
            
            $currentDate = Carbon::now()->toDateString();

            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider', 0777, true);
            }
            $image->move('uploads/slider/', $imagename);
        }else{
            $imagename = $slider->image;
        }

        $slider->title = $request->title;
        $slider->image = $imagename;
        $slider->save();

        toast('Product Updated successfully!', 'success');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        $preImg = public_path("uploads/slider/{$slider->image}");

        if (file_exists($preImg)) {
            unlink($preImg);
        }
        $slider->delete();

        toast('Product Deleted successfully!', 'success');
        return redirect()->back();
    }
}
