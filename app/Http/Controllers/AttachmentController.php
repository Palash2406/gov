<?php

namespace App\Http\Controllers;

use App\attachment;
use App\File;
use App\Link;
use App\Menu;
use App\Page;
use Illuminate\Http\Request;

class AttachmentController extends Controller
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

    public function index(Menu $menu)
    {
        //
        $attachments=$menu->attachment()->orderBy('created_at','desc')->get();

        return view('show_attachment')->with(['menu'=>$menu,'attachments'=>$attachments]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Menu $menu,$form_type)
    {
        //
        return view('attachment_form')->with(['menu'=>$menu,'form_type'=>$form_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        $validatedData = $request->validate([

                'menu_id' => 'required|numeric'
            ]);


        $attachment=new Attachment();
        $attachment->menu_id=$request->menu_id;
        $attachment->type=$request->type;
        // $attachment->save();
        //return $attachment;
        if($request->type=='link'){
            $validatedData = $request->validate([
                'hyperlink' => 'required|url',
                'text_for_display' => 'required|max:500',
                //'menu_id' => 'required|numeric'
            ]);

            $link =new Link();
            $link->text_to_display=$request->text_for_display;
            $link->hyperlink=$request->hyperlink;
            $attachment->save();
            $link->attachment_id=$attachment->id;
            $link->save();
            session()->flash('success','Successfully Saved');
        }

        elseif($request->type=='page'){
          // return $request;

            $validatedData = $request->validate([
                'title' => 'required|max:500',
                'body' => 'required',
                //'menu_id' => 'required|numeric'
            ]);

            $page =new Page();
            $page->title=$request->title;
            $page->body=$request->body;
            $attachment->save();
            $page->attachment_id=$attachment->id;

            //return $page;
            $page->save();
            session()->flash('success','Successfully Saved');
        }
        elseif($request->type=='file'){

            $validatedData = $request->validate([
                'title' => 'required|max:500',
                //'body' => 'required',
                'file' => 'required|max:5000|mimes:jpeg,png,bmp,gif,pdf'
                //'menu_id' => 'required|numeric'
            ]);



            //$file = $request->file('file');

            $file=new File();

            $file->title=$request->title;
            $file->name=time()."_".$request->file('file')->getClientOriginalName();
            $file->size=$request->file('file')->getSize();
            $file->path='files/'.$file->name;
            $file->mime_type=$request->file('file')->getMimeType();

            $attachment->save();
            $file->attachment_id=$attachment->id;
          // return $file;

            $file->save();
            $request->file('file')->move('files',$file->name);
            session()->flash('success','Successfully Saved');


        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$form_type)
    {
        //
        if($form_type=='link'){
            $link=Link::find($id);
            return view('attachment_edit_form')->with(['link'=>$link,'form_type'=>$form_type]);
        }
        elseif($form_type=='file'){
            $file=File::find($id);
            return view('attachment_edit_form')->with(['file'=>$file,'form_type'=>$form_type]);
        }
        elseif($form_type=='page'){
            $page=Page::find($id);
            return view('attachment_edit_form')->with(['page'=>$page,'form_type'=>$form_type]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(attachment $attachment)
    {
        //
    }
}
