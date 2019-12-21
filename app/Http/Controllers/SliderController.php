<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {

        $this->middleware('auth');
    }
    public function index()
    {
        //
        $sliders=Slider::all();//return $sliders;
        return view('slider.show_all')->with('sliders',$sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('slider.create');
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
       // return $request;
//

        $validatedData = $request->validate([
            'title' => 'required|max:500',
            //'body' => 'required',
            'file' => 'required|max:5000|mimes:jpeg,png,bmp,gif'
        ]);



        //$file = $request->file('file');

        $file=new Slider();

        $file->title=$request->title;
        $file->name=time()."_".$request->file('file')->getClientOriginalName();
        $file->size=$request->file('file')->getSize();
        $file->path='images/'.$file->name;
        $file->mime_type=$request->file('file')->getMimeType();

         //return $file;

        $file->save();
        $request->file('file')->move('images',$file->name);
        session()->flash('success','Successfully Saved');


        return redirect('slider');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
        return view('slider.edit')->with('slider',$slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
       //return $slider->id;

        $validatedData = $request->validate([
            'title' => 'required|max:500',
            //'body' => 'required',
            'file' => 'required|max:5000|mimes:jpeg,png,bmp,gif'
            //'menu_id' => 'required|numeric'
        ]);



        //$file = $request->file('file');

        $slider->title=$request->title;
        $slider->name=time()."_".$request->file('file')->getClientOriginalName();
        $slider->size=$request->file('file')->getSize();
        $slider->path='images/'.$slider->name;
        $slider->mime_type=$request->file('file')->getMimeType();

        //return $file;

        $slider->save();
        $request->file('file')->move('images',$slider->name);
        session()->flash('success','Successfully updated');


        return redirect('slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
        $slider->delete();

        session()->flash('success','Successfully Deleted');

        return redirect('slider');
    }
}
