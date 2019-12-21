<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    //



    function __construct()
    {

        $this->middleware('auth');
    }
    public function update(Request $request, Link $link)
    {
        if($request->type=='link'){
            $validatedData = $request->validate([
                'hyperlink' => 'required|url',
                'text_for_display' => 'required|max:500',
                //'menu_id' => 'required|numeric'
            ]);

            $link->text_to_display=$request->text_for_display;
            $link->hyperlink=$request->hyperlink;

            $link->save();
            session()->flash('success','Successfully Updated');
        }
        return back();
    }


    public function destroy(Link $link)
    {
        //
        $link->attachment()->delete();
        $link->delete();
        session()->flash('success','Successfully Deleted');
        return back();
    }

}
