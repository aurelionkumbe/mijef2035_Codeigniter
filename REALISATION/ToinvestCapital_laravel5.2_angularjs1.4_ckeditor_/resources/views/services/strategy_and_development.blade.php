@extends('layouts.app')

@section('header')
<header class="col-md-12" style="font-size: 12px; z-index: 10;box-shadow: 2px 9px 7px 0px rgba(0,0,0,0.7)">
    <div class="col-md-2">
        <img src="images/logo.png" alt="" />
    </div>
    <section class="col-md-10 menu bold">
        <div class="col-md-9 menus" style="margin-top: 5px">
            <a href="{{url('/')}}" class="white" style="color: white" title="">HOME</a> 
            <a href="{{url('/services')}}" title="">SERVICES</a> 
            <a href="{{url('/contacts')}}" title="">CONTACTS</a> 
            <a href="{{url('/privacy')}}" title="">PRIVACY</a> 
            <a href="{{url('/faq')}}" title="">FAQ</a> 
            <a href="{{url('/press-release')}}" title="">PRESS RELEASE</a> 
            <a href="{{url('/solutions')}}" title="">SOLUTIONS</a>
        </div>
        <aside class="recherche col-md-3" style="padding: 0px">

            <div class="col-md-9"><input type="search" placeholder="Search" class="center" style="border: none; text-align: center; height: 30px" /></div><div class="col-md-3" style="padding-left: 0px"><button href="" style="border: none; "><img style=" height: 30px; width: auto" src="{{asset('images/search.png')}}" /></button></div>
        </aside>
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
               <div class="col-md-12  margtop40">
                   
                   
           <div class="row">
                <div class="col-xs-6">
                <ol class="breadcrumb" style="width: auto !important;">
                    <li><a href="{{url('/services')}}">Services</a></li>
                    <li><a class="disabled w3-text-theme">STRATEGY AND DEVELOPMENT SERVICES</a></li>
                </ol>
            </div>
            </div>        
            <div class="col-md-8 margtop40 text-justify" style="">
                <div class="col-md-3 ">
                    <img src="../images/logo.png" alt="" style="width: 100%"/>
                </div>
                <div class="col-md-9 ">
                   <b class="size16"> 1- Business Development</b>

                    <p>Experts from our Strategy & Development Division will assist you with:</p>
                    <ul>
                        <li>Feasibility studies</li>
                        <li>Bid preparation</li>
                        <li>Business Plans</li>
                        <li>Market studies</li>
                        <li>Tax studies</li>
                        <li>Start-up and corporate registration</li>
                        <li>Referral to reliable local partners</li>
                        <li>Source projects</li>
                        <li>Provide information and Business opportunities</li>
                        <li>Organize business trips and guide Client during visits</li>
                        <li>Introduce Customers to officials</li>
                        <li>Consultation on investment practices</li>
                        <li>Assistance in establishing a corporate footprint with partners</li>
                        <li>Translation services ( French & English)</li>
                    </ul>

                <b class="size16">2- Representative services</b>

                    <p>Experts from our Strategy & Development Division will assist you with:</p>
                    <ul>
                        <li>Local representation services</li>
                        <li>Assistance with official representative</li>
                        <li>Assistance with sale representative</li>
                        <li>Negotiate the terms of the different project on behalf of the Customer</li>
                        <li>Start-up and corporate registration</li>
                        <li>Provide reference of companies able to provide technical assistance and manpower</li>
                    </ul>


                </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection
