<?php

namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;

use ToInvestCapital\Http\Requests;
use ToInvestCapital\Document;
use Storage;


class DocumentController extends Controller
{
  public function index()
  {

    $documents = Document::texte()->get();
    return view('admin.documents')->with(compact('documents'));
  }
  public function create(Request $request) {

    // validation


    //

    $name = $request->file('document')->getClientOriginalName();
    $ext = $request->file('document')->getClientOriginalExtension();
    $size = $request->file('document')->getClientSize();
    $file = $request->file('document');

    //$newName = str_random().'.'.$ext;
    $newName = $name.'.'.$ext;

    $maxSize = 25; // MB
    if ($ext === "pdf" && $size <= $maxSize *1024*1024) {
      $moved = $file->move(public_path('uploads/documents'), $name);
      $doc = Document::create([
        'name' => $name,
        'type'=> $ext,
        'size' => $size,
        'country_code' => $request->input('country_code'),
        ]);
    }else{
      $err = 'This document must be a PDF and size <= '.$maxSize.' Mb';
      return redirect()->back()->with(compact("err"));

    }

    return redirect('/dashboard/articles/documents');
  }

  public function delete($id){

   $doc = Document::find($id);
   $doc->delete();
   if (Storage::disk('pdf')->has($doc->name)) {
     Storage::disk('pdf')->delete($doc->name);
   }
   return back();
 }
}
