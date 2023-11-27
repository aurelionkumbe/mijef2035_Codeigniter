@extends('layouts.app')

@section('header')
<?php $page = 'home' ?>
@include('header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div id="garde slider" class="col-md-12 baniere">
          <div id="main-slider" class="flexslider" >
              <ul class="slides">
                <li>
                  <div class="banner-info">
                   <h3 class="w3-container w3-text-white">Your are an Investor ?
                    <br>
                    <small>
                        You have money and you want to invest on a new Business, New Branch of activity, New Market ?
                    </small>
                </h3>
            </div>
            <img src="images/baniere.png" alt="Image" style="width: 100%" />
        </li>
        <li>
            <div class="banner-info">
             <h3 class="w3-container w3-text-white">You have a Business Idea and You are looking for Funds?  </h3>
         </div>
         <img src="images/baniere.png" alt="Image" style="width: 100%" />
     </li>
     @if(isset($slides) && !empty($slides))
     @foreach($slides as $img)
     <li>
        <img src="{{asset('uploads/slides/'.$img->name)}}" alt="Image" style="width: 100%" />
    </li>
    @endforeach
    @endif
</ul>
</div>

<div class="col-md-4 size18 text-center white" style="margin: auto; float: none; background: #7f3e98; padding-top: 15px; padding-bottom: 15px; box-shadow: 2px 7px 7px 7px rgba(0,0,0,0.5)">
    Information pub
</div>
</div>
<div class="col-md-12 " style="margin-top: 50px; padding-bottom: 100px">
    <div class="home-vedet col-md-3">
        <div class="col-md-12 center bold white"><a href="{{route('get.bulletins')}}" class="whitelink">Weekly bulletin</a></div>
        <div class="home-vedet-detail hidden-xs col-md-12">Weekly Bulletin on countries.</div>
    </div>
    <div class="home-vedet col-md-3">
        <div class="col-md-12 center bold white"><a href="{{url('/documents')}}" class="whitelink">Documents</a></div>
        <div class="home-vedet-detail hidden-xs col-md-12">Get important documents to download</div>
    </div>
    <div class="home-vedet col-md-3">
        <div class="col-md-12 center bold white "><a class="whitelink" href="{{url('/activities')}}">Our sectors of activities</a></div>
        <div class="home-vedet-detail hidden-xs col-md-12">
            <ul class="col-md-10 col-md-offset-1">
                <li>Renewable Energy </li>
                <li>House Construction technologies  </li>
                <li>Agriculture and Agro-Industry ...</li>
            </ul>
        </div>
    </div>
    <div class="home-vedet col-md-3">
        <div class="col-md-12 center bold white"><a class="whitelink" href="{{url('/about-us')}}">About us</a></div>
        <div class="home-vedet-detail hidden-xs col-md-12"><b>TOINVESTCAPITAL</b> is a corporate finance company specializes on Business development and Representative...</div>
    </div>
</div>
</div>
</div>
@endsection

@section('footer')

@endsection
