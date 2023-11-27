@extends('layouts.admin')

@section('content')
<div class="col-md-12">
  <h2 class="w3-border-bottom w3-padding w3-bottombar">Video
  </h2>
  <div class="col-md-12">
    <form class="form-inline pull-right col-md-6" action="{{ route('admin::post.videos')}}" method="post">
      {!! csrf_field() !!}
      <div class="input-group w3-padding-24">
        <input type="text" name="name" class="form-control" id="video-name" required="" placeholder="name">
        <span class="input-group-addon"></span>
        <input type="text" name="url" class="form-control" id="video-url" required="" placeholder="youtube source">
        <span class="input-group-btn" title="add a new menu">
          <button type="submit" class="btn btn-default" name="postDocument"><i class="fa fa-upload"></i></button>
        </span>
      </div>
    </div>
  </form>
</div>
@if(isset($error))
<div id="videos" class="col-md-12">
  <div class="alert alert-warning">
    {{$error}}
  </div>
</div>
@endif
<div id="videos" class="col-md-12">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Video list</h3>
      </div>
      <div class="panel-body">

        <div>
          @if(isset($videos))
          <ul class="w3-ul">
            @foreach($videos as $doc)
            <div class="w3-container  w3-pale-green w3-round-medium w3-leftbar w3-rightbar w3-border-grey">
              <a title="delete this faq" href="{{route('admin::delete.video', ['id'=>$doc->id])}}" class="w3-closebtn " data-toggle="jconfirm"><span class="fa fa-trash w3-text-red w3-margin"></span> </a>
              <h4 class="video w3-padding" data-url="{{$doc->url}}">
                <img src="{{$doc->image}}" alt="" />
                <span class="fa fa-video-camera  w3-text-theme"></span><span class="w3-margin-left" style="vertical-align: 1px">{{$doc->name}}</span> <br>
                <span></span>
              </h4>
            </div><br>
            @endforeach
          </ul>
          @else
          <p>no videos found</p>
          @endif
        </div>
      </div>
      <div class="panel-footer"></div>
    </div>
  </div>
  <div class="col-md-6">
    <video id="video-player" style="width: 100%; heigth: 400px; border: 4px solid #222; outline: 2px solid grey" src="https://www.youtube.com/playlist?list=PLB7fGJaOiJP-e94ebbBjlOOrp-JC_1BjR" autoplay poster="{{asset('img/posterimage.jpg')}}">

    </video>
  </div>
</div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function (){
   $('.video').click(function (){
    $('#video-player').attr('src', $(this).attr('data-url'));
  });
 });
</script>
@endsection
