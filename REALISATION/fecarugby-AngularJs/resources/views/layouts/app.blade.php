<!DOCTYPE html>
<html ng-app="fecarugby" ng-controller="AppCtrl">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="index, follow, google">
        <meta name="revisit-after" content="1 Days">
        <meta name="expires" content="never">
        <meta name="distribution" content="Digit expert">
        <meta name="author" content="Digit Experts, T F D S">
        <title>Fecarugby</title>
        <link rel="icon" href="favicon.png" type="image/x-icon">

        <!-- bootstrap -->
        <link href="dist/css/bootstrap.css" rel="stylesheet" media="all">
        <link href="dist/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="dist/lib/select2/css/select2.min.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="dist/css/carousel_1.css" media="all">

        <!-- w3css -->
        <link href="dist/css/w3.css" rel="stylesheet" media="all">

        <!--  App Style -->
        <link href="dist/css/custom.css" rel="stylesheet" media="all">
        <link href="dist/css/style.css" rel="stylesheet" media="all">
<script>
        var SITE_URL = "http://"+window.location.host;
  
</script>
    </head>
    <body>

        <div class="container-fluid">
            <header class="header row" >
                <div class="col-md-2 hidden-sm hidden-xs logo w3-padding">
                    <img class="img-responsive" src={{asset('images/Logo_FECARUGBY-07.png')}} alt="Image logo" />
                </div>
                <div class="col-md-7 pub1">

                    <marquee ><h2 class="">Fédération camerounaise de rugby <br><small>Unie Pour l'Exploit!</small></h2></marquee>

                </div>
                <div class="col-md-3 hidden-sm hidden-xs  paupaul">
                    <span class="btn btn-group">
                        <img class="btn img-responsive" src="images/worlrugby.png" style="height: 100%;  width: auto" alt="Image" />
                        <img class="btn img-responsive" src="images/rugby Afrique.jpg" style="height: 100%;  width: auto" alt="Image" />
                    </span>
                </div>

@include('partials/menu')

            </header>
            @yield('header')
            @yield('content')
            @yield('footer')

            <div class="col-md-1 fixed" style="bottom: -20px; z-index: 1001; padding: 0; left: -12px; "><img src="images/divLeft.png" alt="" /></div>
            <div class="col-md-1 fixed" style="bottom: -20px; z-index: 1001; padding: 0; right: -12px; "><img src="images/divRight.png" alt="" /></div>
            <div class="footer fixed row w3-topbar w3-border-green hidden-sm hidden-xs">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="nav nav-tabs w3-text-red">
                        <li class="btn btn-link">Questions</li>
                        <li class="btn btn-link">Mentions Légales</li>
                        <li class="btn btn-link">Contacts</li>
                        <li>
                            <div class="social w3-padding-ver-4 w3-white" ><a href="https://www.facebook.com/Fecarugby-fédération-camerounaise-de-rugby-190086384350994/?fref=ts" target="_blank" ><i class="fa fa-2x fa-facebook-square"></i></a> <a  href="#"><i class="fa fa-2x fa-youtube-square"></i></a> <a  href="#"><i class="fa fa-2x fa-instagram"></i></a> <a  href="#"><i class="fa fa-2x fa fa-twitter-square"></i></a></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 hidden-md hidden-print hidden-lg">
                <div class="social w3-white w3-center w3-container" ><a href="https://www.facebook.com/Fecarugby-fédération-camerounaise-de-rugby-190086384350994/?fref=ts" target="_blank" ><i class="fa fa-2x fa-facebook-square"></i></a> <a  href="#"><i class="fa fa-2x fa-youtube-square"></i></a> <a  href="#"><i class="fa fa-2x fa-instagram"></i></a> <a  href="#"><i class="fa fa-2x fa fa-twitter-square"></i></a></div>
                <ul class="nav nav-stacked w3-text-red">
                    <li class="btn btn-danger">Questions</li>
                    <li class="btn btn-danger">Mentions Légales</li>
                    <li class="btn btn-danger">Contacts</li>
                    <li>

                    </li>
                </ul>
            </div>
        </div>
        <!--  JQuery plugins -->
        <script src="dist/js/jquery.min.js"></script>
        <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>


        <script src="{{asset('dist/js/plugins.js')}}"></script>

        <!-- Angular JS Plugins -->
        <script src="{{asset('dist/js/angular.min.js')}}"></script>
        <script src="{{asset('dist/js/angular-resource.min.js')}}"></script>
        <script src="{{asset('dist/js/angular-sanitize.min.js')}}"></script>
        <script src="{{asset('dist/js/angular-ui-router.min.js')}}"></script>

        <script src="{{asset('app/app.js')}}"></script>
        <script src="{{asset('app/contollers/AppCtrl.js')}}"></script>
        <script src="{{asset('app/contollers/DirigeantCtrl.js')}}"></script>
        <script src="{{asset('app/contollers/CompetitionCtrl.js')}}"></script>
        <script src="{{asset('app/contollers/DocumentCtrl.js')}}"></script>
        <script src="{{asset('app/contollers/EquipeCtrl.js')}}"></script>

        <!-- Javascript Plugins -->
    </body>
</html>
