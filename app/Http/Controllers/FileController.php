<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //



    function __construct()
    {

        $this->middleware('auth');
    }

    public function update(Request $request, File $file)
    {
        //

    if($request->type=='file'){

        $validatedData = $request->validate([
            'title' => 'required',
            //'body' => 'required',
            'file' => 'required|max:5000|mimes:jpeg,png,bmp,gif,pdf'
            //'menu_id' => 'required|numeric'
        ]);



        //$file = $request->file('file');


        $file->title=$request->title;
        $file->name=time()."_".$request->file('file')->getClientOriginalName();
        $file->size=$request->file('file')->getSize();
        $file->path='files/'.$file->name;
        $file->mime_type=$request->file('file')->getMimeType();


        // return $file;

        $file->save();
        //return $file;
        $request->file('file')->move('files',$file->name);
        session()->flash('success','Successfully Updated');


    }
        return back();
        //return $request->file()->getClientOriginalName();
    }




    public function destroy(File $file)
    {
        //
        $file->attachment()->delete();
        $file->delete();
        session()->flash('success','Successfully Deleted');
        return back();
    }
}
