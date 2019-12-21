<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {

        $this->middleware('auth')->except(['index']);
    }
        public function index()
    {
        //
        //$menus=Menu::all();
        $sub_menus=Menu::with('children')->get();
       // return $menus;
        return view('public')->with('sub_menus',$sub_menus);
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
        $validatedData = $request->validate([
            'card_name' => 'required',
        ]);

        $menu= new Menu();
        $menu->name=$request->card_name;
        if($request->location==-1){

            $menu->parent_id=$request->parent_id;
            $menu->location=null;
        }
        else{
            $menu->parent_id=null;
            $menu->location=$request->location;
        }

        $menu->save();

        session()->flash('success','Successfully saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {

        $validatedData = $request->validate([
            'card_name' => 'required',
        ]);
        $menu->name=$request->card_name;
        $menu->update();
        session()->flash('success','Successfully Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //

        $menu->attachment()->delete();
        $menu->children()->delete();
        $menu->delete();
        session()->flash('success','Successfully Deleted');
        return redirect(route('public'));
    }
}
