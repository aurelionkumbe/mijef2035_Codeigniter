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
                <div class="col-xs-12 col-md-4">
                    <ol class="breadcrumb" style="width: auto !important;">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a class="disabled w3-text-theme">About Us</a></li>
                    </ol>
                </div>
            </div>

            <div class="col-md-6 margtop40 text-justify" style="margin: auto; float: none">
                <div class="col-md-3 ">
                    <img src="../images/logo.png" alt="" style="width: 100%; margin-bottom: 7px;"/>
                </div>
                <p>
                    TOINVESTCAPITAL is a corporate finance company specializes on Business development and Representative Services to Customers worldwide. <br><br>
                    With offices in Douala and Yaoundé, TOINVESTCAPITAL offers business development and representative services focused on Economic and Social infrastructures, Trade, Projects management and financial facilitation.

                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('footer')

    @endsection
