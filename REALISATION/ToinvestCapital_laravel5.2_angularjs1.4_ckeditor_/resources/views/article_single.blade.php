@extends('layouts.app')

@section('header')
<header class="col-md-12" style="font-size: 12px; z-index: 10;box-shadow: 2px 9px 7px 0px rgba(0,0,0,0.7)">
    <div class="col-md-2">
        <img src="{{asset('images/logo.png')}}" alt="logo" />
    </div>
    <section class="col-md-10 menu bold">
        <div class="col-md-9 menus" style="margin-top: 5px">
            <a href="{{url('/')}}"  class="white" style="color: white"  title="">HOME</a>
            <a href="{{url('/services')}}" title="">SERVICES</a>
            <a href="{{url('/contacts')}}" title="">CONTACTS</a>
            <a href="{{url('/privacy')}}" title="">PRIVACY</a>
            <a href="{{url('/faq')}}" title="">FAQ</a>
            <a href="{{url('/press-release')}}" title="">PRESS RELEASE</a>
            <a href="{{url('/solutions')}}" title="">SOLUTIONS</a>
        </div>
        <div class=" col-md-3" style="padding: 0px">
            <form class="col-md-9 form form-inline">
              <div class="form-group  has-feedback">
                <input type="text" placeholder="Search" name="search" class="form-control text-center" />
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </form>
        </div>
    </section>
    <div class="col-md-3 socials center" style="box-shadow: 2px 7px 7px 4px rgba(0,0,0,0.7); position: absolute; left: 40%; top: 98%; z-index: 100; background: white">
        <a  href="https://www.facebook.com/To-invest-capital-237-1721128814843180" target="_blanc"><i class="fa fa-facebook-square fa-2x"></i> </a>
        <a  href="https://www.facebook.com/Buy-ton-way-1656552834600874" target="_blanc"><i class="fa fa-youtube-square fa-2x"></i> </a>
        <a  href="https://www.facebook.com/Buy-ton-way-1656552834600874" target="_blanc"><i class="fa fa-linkedin-square fa-2x"></i> </a>
        <a  href="https://www.facebook.com/Buy-ton-way-1656552834600874" target="_blanc"><i class="fa fa-google-plus-square fa-2x"></i> </a>
    </div>
</header>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 " style="margin-top: 70px">
            @if(isset($article))

            <div class="col-md-8 col-md-offset-2 w3-theme-light">
                <div class="w3-container margbtm10 center size18 bold w3-margin w3-bottombar text-capitalize">{{ucwords($article->title)}}</div>
                <div class="text-center w3-tiny w3-padding-0 w3-margin-0">Published at {{empty($article->published_at)?'...':'$article->published_at'}}</div>
                <div class="w3-margin w3-container text-center"><img src="{{asset('images/public.png')}}" alt="Image" style="width: 50%; height: 100px"></div>

                    <article class="w3-container w3-justify w3-white w3-padding-ver-32 w3-padding-hor-48 " style="word-wrap: break-word !important">
                        <?php echo html_entity_decode($article->content); ?>
                    </article>
                    <!--
                    <form>
                        <textarea class="ckeditor" cols="30" rows="6" id="article-content" required="required">#
                        {{$article->content}}
                        </textarea>
                    </form>
                    -->


            </div>
            @else
            <h1>Weekly Bulletin content here</h1>
            <small>site on building...</small>
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection
