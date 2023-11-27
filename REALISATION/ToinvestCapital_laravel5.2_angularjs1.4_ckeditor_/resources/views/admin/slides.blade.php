@extends('layouts.admin')

@section('content')
<div class="col-md-12">
  <h2 class="w3-border-bottom w3-padding w3-bottombar">Slides
    <form class="form-inline pull-right" action="{{ route('admin::post.slide')}}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">New Slide</label>
        <div class="input-group">
         <input type="hidden" name="country_code" value="CMR">
       </div>
       <div class="input-group">
        <input type="file" name="document" class="form-control" id="document-country" required="" placeholder="name in English">
        <span class="input-group-btn" title="add a new menu">
          <button type="submit" class="btn btn-default" name="postDocument"><i class="fa fa-upload"></i></button>
        </span>
      </div>
    </div>
  </form>
</h2>
@if(Session('err') !== NULL)
<div class="col-md-12">
  <div class="alert alert-warning">
   <span class="text-danger"> {{Session('err')}}</span>
 </div>
</div>
@endif
<div id="slides" class="col-md-12 w3-padding-0">
  <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">slides list</h3>

      </div>
      <div class="panel-body">

        <div>
          @if(isset($slides))
          <ul class="w3-ul">
            @foreach($slides as $doc)
            <div class=" w3-pale-green w3-round-medium w3-leftbar w3-rightbar w3-border-grey" style="cursor: pointer;">
              <a title="delete" href="{{url('dashboard/slides/'.$doc->id.'/del')}}" class="w3-closebtn " data-toggle="jconfirm"><span class="fa fa-trash  w3-text-orange w3-margin-4"></span> </a>
              <h4 class="slide w3-small w3-padding " data-url="{{asset('uploads/slides/'.$doc->name)}}" data-code="{{$doc->country_code}}">
                <img style="height: 20px; position: relative; top: -5px; padding: 0; margin:0;" src="{{asset('uploads/slides/'.$doc->name)}}" alt="" />
                <span hidden class="fa fa-image fa-2x  w3-text-theme"></span>
                <span class="w3-margin-left" style="vertical-align: 6px">{{$doc->name}}</span> <br>
              </h4>
            </div>
            @endforeach
          </ul>
          @else
          <p>nothing found</p>
          @endif
        </div>
      </div>
      <div class="panel-footer"></div>
    </div>
  </div>
  <div class="col-md-7">
    <img id="slide-previewer" src="" class="col-md-12 w3-padding-0 w3-grey w3-border" width="100%" height="400px" >
  </div>
</div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function (){
    $('.slide').mouseover(function (){
      $('#slide-previewer').attr('src', $(this).attr('data-url'));
    });
  });

</script>
@endsection
