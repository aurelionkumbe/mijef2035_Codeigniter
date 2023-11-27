@extends('layouts.app')

@section('header')
<?php $page = 'home' ?>
@include('header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <ol class="breadcrumb" style="width: auto !important;">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a class="disabled w3-text-theme">Weekly Bulletins</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 " style="margin-top: 70px">
            @if(isset($articles))
            @forelse($articles as $a)
            <div class="col-md-6 w3-theme-light" style="min-height: 230px; margin-bottom: 24px;">
                <div class="col-md-12 margbtm10 center size18 w3-padding bold text-capitalize">{{ucwords($a->title)}}</div>
                <div class="col-md-6"><img src="images/public.png" alt="Image" style="width: 100%; height: 100px"></div>
                <div class="col-md-6" style="min-height: 150px">
                  <div class="" style="word-wrap: break-word;">
                    {{str_limit($a->presentation, 150)}}
                </div>
                <br><a style="position: absolute; bottom: 8px; right: 8px;" class="btn btn-sm btn-default" href="{{route('show.article', ['slug'=>$a->slug])}}" title="read more"> more ... </a></div>
            </div>
            @empty
            <h1>Weekly Bulletin here</h1>
            <small>site on building...</small>
            @endforelse
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection
