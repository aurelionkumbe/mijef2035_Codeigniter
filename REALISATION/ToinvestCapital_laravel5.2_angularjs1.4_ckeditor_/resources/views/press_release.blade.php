@extends('layouts.app')

@section('header')
<?php $page = 'press' ?>
@include('header')
@endsection
@section('headerscript')
<link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/5.8/video.min.js"></script>
@if(0)
<script data-cfasync="false">
  (function(r,e,E,m,b){E[r]=E[r]||{};E[r][b]=E[r][b]||function(){
    (E[r].q=E[r].q||[]).push(arguments)};b=m.getElementsByTagName(e)[0];m=m.createElement(e);
    m.async=1;m.src=("file:"==location.protocol?"https:":"")+"//s.reembed.com/G-XLdp0X.js";
    b.parentNode.insertBefore(m,b)})("reEmbed","script",window,document,"api");
  </script>
  @endif
  @endsection

  @section('content')
  <div class="container">
    <p class="row">&nbsp;</p>
    <p class="row"></p>

    <div class="row">
      <div id="videos" class="col-md-12">
        <div class="col-md-6 col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Vidéos Conférences <small>[Playlist]</small>
                <form class="hidden pull-right form form-inline">
                  <select name="country" class="form-control input-sm" style="position: relative; top: -6px; padding: 1px;">
                    <option value="">Country</option>
                    @foreach($countries as $c)
                    <option value="{{ $c->code}}">{{ $c->name}}</option>
                    @endforeach
                  </select>
                </form>
              </h3>
            </div>
            <div class="panel-body w3-padding-4">

              <div>
                @if(isset($videos))
                <ul class="w3-ul">
                  @foreach($videos as $doc)
                  <li class="w3-pale-green w3-round-medium w3-leftbar w3-rightbar w3-border-grey w3-padding-0" style="cursor: pointer ">
                    <h4 class="video w3-padding w3-small" data-url="{{$doc->url}}">
                      <img src="{{$doc->image}}" alt="" />
                      <span class="fa fa-video-camera  w3-text-theme"></span><span class="w3-margin-left" style="vertical-align: 1px">{{$doc->name}}</span> <br>
                      <span></span>
                    </h4>
                  </li><br>
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
        <div class="col-md-6 col-sm-6">
          @if(0)
          <iframe hidden width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLB7fGJaOiJP-e94ebbBjlOOrp-JC_1BjR" frameborder="0" allowfullscreen></iframe>

          <div id="myElement">Loading the player...</div>
          <script type="text/javascript">
            var playerInstance = jwplayer("myElement");
            playerInstance.setup({
              file: "//www.youtube.com/watch?v=8CjdLYBDUqw",
              width: 640,
              height: 360
            });
          </script>
          <video id="video-player" style="width: 100%; heigth: 400px;  border: 4px solid #222; outline: 2px solid grey;" src="https://www.youtube.com/watch?v=KXSDWN364xE&index=1&list=PLB7fGJaOiJP-e94ebbBjlOOrp-JC_1BjR" autoplay poster="{{asset('img/posterimage.jpg')}}">
          </video>
          @endif
          <video
          id="video-player"
          class="video-js vjs-default-skin"
          controls
          autoplay
          width="100%" height="400"
          data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=xjS6SftYQaQ"}] }'
          >
        </video>

      </div>
    </div>

    <div hidden="" class="col-md-8 col-md-offset-2 " style="margin-top: 70px">
      <h1>Press Release here</h1>
      <small>site on building...</small>
    </div>
  </div>
</div>
@endsection

@section('footer')

@endsection
