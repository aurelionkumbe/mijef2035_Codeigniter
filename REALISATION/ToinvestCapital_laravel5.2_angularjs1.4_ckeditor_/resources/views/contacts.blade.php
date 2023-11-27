@extends('layouts.app')
@section('php')

@endsection


@section('header')
<?php $page = 'contacts' ?>
@include('header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 " style="margin-top: 50px">
            <div class="col-md-8 " >
                <form action="{{action('MailController@sendSimpleEmailReminder')}}" method="post" class="col-md-8 form-horizontal" style="color: #7f3e98; padding: 0px; margin: auto; float: none"  >
                  {{ csrf_field()}}
                    <div class="input-group-lg">
                        <label class="col-md-12 lead left">Name: <input style="border-radius: 0px; background: #e5e5e5; border: #e5e5e5" name="contact[name]" type="text" class="form-control" /></label>
                        <label class="col-md-12 lead left">Email :<input style="border-radius: 0px; background: #e5e5e5; border: #e5e5e5" name="contact[email]" type="text" class="form-control" /></label>
                        <label class="col-md-12 lead left">Message :<textarea style="border-radius: 0px; background: #e5e5e5;border: #e5e5e5; resize: none" class="form-control" cols="23" rows="5" name="contact[message]"></textarea></label>

                    </div>
                    <div class="col-md-12">
                      <div class="col-md-12">
                        {!! captcha_image_html('ContactCaptcha') !!}
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
            <p>&nbsp;</p>
            <div class="col-md-4 size18 text-center white" style=" background: grey; padding-top: 15px; padding-bottom: 15px; ">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1989.9171315639232!2d9.697595655375185!3d4.054200348054009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwMDMnMTUuMSJOIDnCsDQxJzU1LjMiRQ!5e0!3m2!1sfr!2scm!4v1463429521713" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                <div hidden="" id="map" style="width: 100%; height: 300px"></div>


                <table class="table table-responsive">
                    <legend>
                        <h3 style="color: #7f3e98;" >Our contacts</h3>
                    </legend>
                    <tr>
                        <td>
                            Phone:
                        </td>
                        <td>
                            (+237) 672 782 004  <br> (+237) 664 465 587
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            infos@toinvestcapital.com
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Adresse:
                        </td>
                        <td>
                            Douala-Akwa-Boulevard de la liberte
                        </td>
                    </tr>

                </table>
            </div>

        </div>
    </div>
</div>
<!--
    <script>
      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
          center: {lat: 4.054195, lng: 9.698690},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
    -->
    @endsection

    @section('footer')

    @endsection
