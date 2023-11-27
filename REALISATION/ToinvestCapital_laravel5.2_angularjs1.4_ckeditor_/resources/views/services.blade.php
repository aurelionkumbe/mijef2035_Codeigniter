@extends('layouts.app')

@section('header')
<?php $page = 'services' ?>
@include('header')
@endsection

@section('content')
<div class="container">
    <div id="service" class="row">
        <div class="col-md-12 " style="margin-top: 50px">
            <p>&nbsp;</p>
            <div class="col-md-12" >
                <div class="col-md-4  col-xs-12  item  w3-border">
                    <div class="col-md-12 margbtm10 center size18 bold">STRATEGY AND DEVELOPMENT SERVICES</div>
                    <div class="col-md-6">
                        <img src="images/public.png" class="img-responsive  img-thumbnail" alt="Image" style="width: 100%; height: 100px" />
                    </div>
                    <div class="col-md-6  text-justify" style="min-height: 150px" >
                        <ol class="" style="list-style-position: outside; padding: 0">
                            <li>Business Development</li>
                            <li>Representative services</li>
                        </ol>
                    </div>
                    <p class="col-md-12"><a class="btn btn-block btn-default" href="{{url('services/strategy_and_development')}}"><small>read more ...</small></a></p>
                </div>
                <div class="col-md-4 col-xs-12 item w3-border">
                    <div class="col-md-12 margbtm10 center size18 bold">PROJECT MANAGEMENT SERVICES</div>
                    <div class="col-md-6">
                        <img src="images/public.png" class="img-responsive  img-thumbnail" alt="Image" style="width: 100%; height: 100px" />
                    </div>
                    <div class="col-md-6 text-justify" style="min-height: 150px" >
                        <ul class="" style="list-style-position: outside;  list-style: none; padding: 0">
                            <li>TOINVESTCAPITAL Project Management Division will join forces with your company to ...</li>
                            <li></li>
                        </ul>
                    </div>
                    <p class="col-md-12"><a class="btn btn-block btn-default" href="{{url('services/projet_management')}}"><small>read more ...</small></a></p>
                </div>
                <div class="col-md-4  col-xs-12 item w3-border">
                    <div class="col-md-12 margbtm10 center size18 bold">CAPITAL ADVISORY </div>
                    <div class="col-md-6">
                        <img src="images/public.png" class="img-responsive  img-thumbnail" alt="Image" style="width: 100%; height: 100px" />
                    </div>
                    <div class="col-md-6  text-justify" style="min-height: 150px" >
                        <ol class="" style="list-style-position: outside; padding: 0">
                            <li>Investment Counseling </li>
                            <li>Investment Promotion</li>
                        </ol>
                    </div>
                    <p>&nbsp;</p>
                    <p class="col-md-12"><a class="btn btn-block btn-default" href="{{url('services/capital_advisory')}}"><small>read more ...</small></a></p>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection
