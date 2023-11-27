<?php

namespace ToInvestCapital\Http\Controllers;

use Illuminate\Http\Request;

use ToInvestCapital\Http\Requests;
use ToInvestCapital\Video;

class VideoController extends Controller
{
  public function index()
  {

    $videos = Video::all();
    return view('admin.videos')->with(compact('videos'));
  }
  public function create(Request $request) {
      $this->validate($request, [
          'name' => 'max:50',
          'url' => 'url',
      ]);
      
      Video::create([
          'name' => $request->input('name'),
            'url' => $request->input('url'),

      ]);
      return back();
  }
  public function delete($id){

     $doc = Video::find($id);
     $doc->delete();
     //Storage::disk('video')->delete($doc->name);
    return back();
  }


}
