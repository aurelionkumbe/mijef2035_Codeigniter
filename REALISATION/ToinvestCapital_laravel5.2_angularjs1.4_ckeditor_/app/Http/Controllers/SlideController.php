<?php

namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;

use ToInvestCapital\Http\Requests;
use ToInvestCapital\Document;
use Storage;

class SlideController extends Controller
{
    public function index()
    {

        $slides = Document::imageSlide()->get();
        return view('admin.slides')->with(compact('slides'));
    }
    public function create(Request $request) {

    // validation


    //

        $name = $request->file('document')->getClientOriginalName();
        $ext = $request->file('document')->getClientOriginalExtension();
        $size = $request->file('document')->getClientSize();
        $file = $request->file('document');

        $newName = str_random().'.'.$ext;
        //$newName = $name.'.'.$ext;

    $maxSize = 25; // MB
    if ( in_array($ext, ['png', 'jpeg', 'jpg'])&& $size <= $maxSize *1024*1024) {
        $moved = $file->move(public_path('uploads/slides'), $newName);
        $doc = Document::create([
            'name' => $newName,
            'image' => $newName,
            'type'=> 'slide',
            'size' => $size,
            //'country_code' => $request->input('country_code'), // for NULL value
            
            ]);
    }else{
        $err = 'This document must be an Image with a size <= '.$maxSize.' Mb';
        return redirect()->back()->with(compact("err"));

    }

    return redirect('/dashboard/slides');
}


public function delete($id){

 $doc = Document::find($id);
 $doc->delete();
 if (Storage::disk('slide')->has($doc->name)) {
    Storage::disk('slide')->delete($doc->name);
    return back();
}
}
}
