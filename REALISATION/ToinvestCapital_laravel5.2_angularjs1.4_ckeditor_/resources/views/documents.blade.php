@extends('layouts.app')



@section('header')
<?php $page = 'home' ?>
@include('header')
@endsection

@section('content')
<div class="container">
  <p class="row"></p>
  <p class="row"></p>
  <p class="row"></p>
  <p class="row"></p>

  <div class="row">
    <div id="documents" class="col-md-12">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Documents list
              <form class="pull-right form form-inline">
                <select name="country" class="form-control input-sm" style="position: relative; top: -6px; padding: 1px;">
                  <option value="">Country</option>
                  @foreach($countries as $c)
                  <option value="{{ $c->code}}">{{ $c->name}}</option>
                  @endforeach
                </select>
              </form>
            </h3>
          </div>
          <div class="panel-body">

            <div>
              @if(isset($documents))
              <ul class="w3-ul">
                @foreach($documents as $doc)
                <div class=" w3-pale-green w3-round-medium w3-leftbar w3-rightbar w3-border-grey" style="cursor: pointer;">
                  <h4 class="row document w3-padding w3-small" data-url="{{asset('uploads/documents/'.$doc->name)}}" data-code="{{$doc->country_code}}">
                    <img hidden="" src="{{$doc->image}}" alt="" />
                    <div class="col-md-1 w3-padding-0">
                      <span class="fa fa-book fa-1x  w3-text-theme"></span>
                    </div>
                    <div class="col-md-11">
                      <span class="w3-margin-left" style="vertical-align: 6px">{{$doc->name}}</span> <br>
                    </div>
                  </h4>
                </div><br>
                @endforeach
              </ul>
              @else
              <p>No Documents found</p>
              @endif
            </div>
          </div>
          <div class="panel-footer"></div>
        </div>
      </div>
      <div class="col-md-8">
        <iframe id="document-reader" src="" class="col-md-12 w3-border w3-padding-8 w3-grey w3-round-medium w3-border-grey" width="100%" height="400px" ></iframe>
        <a href="#documents" class="hidden-md btn btn-block w3-black text-center"><i class="fa fa-list"></i> back to list of documents </a>
      </div>
    </div>

  </div>
</div>
@endsection

@section('footer')

@endsection

@section('script')
<script>
  $(document).ready(function (){
   $('.document').click(function (){
     var src = $(this).attr('data-url');
     $('#document-reader').attr('src', src);
     window.location.hash = "document-reader";
   });

   $('select[name=country]').on('change', function () {
    var val = $(this).val();
         //alert(val);
         if (val === "") {
           $('.document').parent().show();
         }else {
           $('.document').each(function(index, el) {
             var country_code = $(this).attr('data-code');
             if (val === country_code) {
               $(this).parent().show("slow/400/fast");
             }else {
               $(this).parent().hide("slow/400/fast");
             }
           });
         }
       });
 });
</script>
@endsection
