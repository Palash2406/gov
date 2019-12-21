<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    function __construct()
    {

        $this->middleware('auth')->except(['show']);
    }

    public function show($page){

        $page= Page::find($page);
        //return $page;
        return view('show_page')->with('page',$page);

    }

    public function update(Request $request, Page $page)
    {
        if($request->type=='page'){
            // return $request;

            $validatedData = $request->validate([
                'title' => 'required',
                'body' => 'required',
                //'menu_id' => 'required|numeric'
            ]);


            $page->title=$request->title;
            $page->body=$request->body;

            //return $page;
            $page->save();
            session()->flash('success','Successfully Updated');
        }

        return back();
    }



    public function destroy(Page $page)
    {
        //
         $page->attachment()->delete();
         $page->delete();
         session()->flash('success','Successfully Deleted');
         return back();
    }
}
