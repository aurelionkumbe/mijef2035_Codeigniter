<header class="col-md-12" style="font-size: 12px; z-index: 10;box-shadow: 2px 9px 7px 0px rgba(0,0,0,0.7)">
    <div class="col-md-2">
        <img id="logo" src="images/logo.png" alt="" />
    </div>
    <a class="btn btn-default visible-xs" style="position: absolute; top: 16px; right: 26px; z-index: 6" onclick="$('.menu').toggleClass('hidden-xs', 'visible-md')">
        <span class="glyphicon glyphicon-th w3-large"></span>
    </a>
    <section class="col-md-10 menu bold hidden-xs">
        <div class="col-md-9 menus w3-padding-8" style="margin-top: 5px;" >
            <a href="{{url('/')}}" class="<?php echo $page === 'home' ? 'w3-text-white': ''?>"  title="">HOME</a>
            <a class="<?php echo $page === 'services' ? 'w3-text-white': ''?>" href="{{url('/services')}}" title="">SERVICES</a>
            <a class="<?php echo $page === 'contacts' ? 'w3-text-white': ''?>" href="{{url('/contacts')}}" title="">CONTACTS</a>
            <a class="<?php echo $page === 'privacy' ? 'w3-text-white': ''?>" href="{{url('/privacy')}}" title="">PRIVACY</a>
            <a class="<?php echo $page === 'faq' ? 'w3-text-white': ''?>" href="{{url('/faq')}}" title="">FAQ</a>
            <a class="<?php echo $page === 'press' ? 'w3-text-white': ''?>" href="{{url('/press-release')}}" title="">PRESS RELEASE</a>
            <a class="<?php echo $page === 'solutions' ? 'w3-text-white': ''?>" href="{{url('/solutions')}}" title="">SOLUTIONS</a>
        </div>
        <div class="hidden col-md-3" style="padding: 0px">
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
    <link href="../../public/css/style.css" rel="stylesheet" type="text/css"/>
</div>
</header>
