@extends('layouts.app')

@section('header')
<?php $page = 'home' ?>
@include('header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12  margtop40">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <ol class="breadcrumb" style="width: auto !important;">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a class="disabled w3-text-theme">Our sectors of activities</a></li>
                    </ol>
                </div>
                <div class="col-md-6 margtop40 text-justify" style="margin: auto; float: none">
                    <div class="col-md-4 "><img src="images/logo.png" alt="" style="width: 100%"/></div>
                    <p class="row">&nbsp;</p>
                    <p class="row">&nbsp;</p>
                    <ul class="col-md-10 col-md-offset-1 w3-ul w3-large">
                        <li>Renewable Energy </li>
                        <li>House Construction technologies  </li>
                        <li>Agriculture and Agro-Industry  expansion</li>
                        <li>Education & health</li>
                        <li>Environment protection </li>
                        <li>Information technologies </li>
                        <li>Tourism & Hospitality </li>
                        <li>Property development </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    @endsection

    @section('footer')

    @endsection
