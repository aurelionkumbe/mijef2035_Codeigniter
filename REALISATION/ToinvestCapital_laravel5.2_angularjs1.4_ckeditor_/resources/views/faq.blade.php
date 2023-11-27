@extends('layouts.app')

@section('header')
<?php $page = 'faq' ?>
@include('header')
@endsection

@section('content')
<div class="container">
    <div class="row " style="margin: 80px 0 50px 0">

        <div class="col-md-8 col-md-offset-2 ">
            <p class=" size22 paddingbtm20 center" style="color: #7f3e98; line-height: 36px">FREQUENLY ASKED QUESTIONS</p>
        </div>
        <div class="col-md-2">
            <a style="border: 2px solid #444;"  onclick="document.getElementById('add-faq-form').style.display = 'block'"  class="btn btn-default pull-right">
                @if(session('error'))
                <div class="alert alert-danger">session('error')</div>
                @endif
                <span class="fa fa-comments">&nbsp;</span>Ask for Assistance</a>
            </div>
            <div id="add-faq-form" class="w3-modal">
              <div class="w3-modal-content" style="width: 600px">
                <div class="w3-container">
                    <span onclick="document.getElementById('add-faq-form').style.display='none'"
                    class="w3-closebtn">&times;</span>
                    <h3>&nbsp;</h3>
                    <form action="{{action('FaqController@postQuestion')}}" method="post" class="col-md-8 form-horizontal" style="color: #7f3e98; padding: 0px; margin: auto; float: none"  >
                        {{ csrf_field()}}
                        <div class="input-group-lg">
                          <label class="col-md-12 lead left">Your question: 
                              <input style="border-radius: 0px; background: #e5e5e5; border: #e5e5e5" name="question" required="" type="text" class="form-control" /></label>
                          </div>
                          <div class="col-md-12">
                            <div class="col-md-12">
                              {!! captcha_image_html('FaqCaptcha') !!}
                          </div>
                          <div class="col-md-8">
                              <label for="CaptchaCode">Are you human ?</label>
                              <input type="text" id="CaptchaCode" name="CaptchaCode" placeholder="code" style="border-radius: 0px; background: #e5e5e5; border: #e5e5e5; text-align: center;" class="form-control" >
                          </div>
                      </div>
                      <p class="row">&nbsp;</p>
                      <p class="row">&nbsp;</p>

                      <div class="input-group-lg">
                          <label class="col-md-12 lead text-center"><input style="border-radius: 0px; float: none; margin: auto; background: #e5e5e5; border: #e5e5e5; color: #7f3e98" type="submit" value="Send" class="btn btn-primary btn-lg btn-block w3-theme" /></label>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2 ">
        <div id="faqs" class="col-md-12">
            @if(isset($faqs))
            <?php $i = 1 ?>
            @foreach($faqs as $f)
            @if($f->responce !== '')
            <div class="w3-container   w3-padding w3-theme-l5 w3-round-medium w3-leftbar w3-rightbar w3-border-grey">
                <div style="position: absolute">
                    <span style="position: relative; left: -22px; font-size: 16px" class="fa fa-question-circle  w3-text-theme"></span>
                </div>
                <p class="faq">
                    <b class="w3-margin-left"><b>{{$i++}}-&nbsp;</b>{!!htmlspecialchars_decode($f->question)!!}</b>
                </p>
                <p class="w3-padding-ver-16">{!! htmlspecialchars_decode($f->responce)!!}</p>
            </div><br>
            @endif
            @endforeach
            @else
            <div class="w3-jumbo text-center">
                <small>No Assistances are posted,</small><br>Coming soon !!!
            </div>
            @endif
        </div>
        <div hidden="">
            <div class="col-md-6 text-justify margtop25">
                <p class="size16 bold">1. What are the different capitals of Central African Countries?</p>
                The different capitals of Central African Countries are: Luanda, Bujumbura, Yaoundé, Libreville, Malabo, Bangui, Kinshasa, Brazzaville, SAO TOME, and Ndjamena.
                    <!--  <div class="">
                          Commentez sur:
                          <textarea class="form-control" rows="5"></textarea>
                          Notez:
                      </div>-->
                  </div>
                  <div class="col-md-6 text-justify margtop25">
                    <p class="size16 bold">2. What are the officials Languages spoken in Central African Countries?</p>
                    Mostly French and English

                </div>
                <div class="col-md-6 text-justify margtop25">
                    <p class="size16 bold">3. What is the estimated population inhabited in Central African Countries?</p>
                    The 2014 population of Central African Countries is estimated at 150 million.

                </div>
                <div class="col-md-6 text-justify margtop25">
                    <p class="size16 bold">4. What kind of Government rules in Central African Countries Military or civilian?</p>
                    All the countries of Central Africa are ruled by a civilian Government and have never had a military Government. Cameroon is one of the most peaceful nations in Africa.

                </div>
                <div class="col-md-6 text-justify margtop25">
                    <p class="size16 bold">5. What is the currency used in Central African Countries? </p>
                    The countries that speak French use the CFA franc together with five other regional countries. <br/>
                    <b> €1.00 is equal to about 655 CFA.</b><br>
                    <b>$1.00 is equal to about 585 CFA. </b>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer class="col-md-12 center fixed white">
    &copy 2016 By <a href="http://digit-experts.com"> Digit Experts </a>
</footer>
@endsection
