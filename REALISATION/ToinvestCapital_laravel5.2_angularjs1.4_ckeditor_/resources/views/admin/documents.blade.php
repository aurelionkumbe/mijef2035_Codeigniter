@extends('layouts.admin')

@section('content')
  <div class="col-md-12">
    <h2 class="w3-border-bottom w3-padding w3-bottombar">Documents
      <form class="form-inline pull-right" action="{{ route('admin::post.documents')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">New Document</label>
          <div class="input-group">
            <?php $countries = \ToInvestCapital\Country::all(); ?>
            <select name="country_code" class="form-control" id="document-country" required="">
              @if(isset($countries))
              <option value="">-- select a language --</option>
                <optgroup label="Countries">
                  @foreach($countries as $m)
                    <option value="{{$m->code}}">{{$m->name}}</option>
                  @endforeach
                </optgroup>
              @else
                <option>no countries found</option>
              @endif
            </select>
          </div>
          <div class="input-group">
            <input type="file" name="document" class="form-control" id="document-country" required="" placeholder="name in English">
            <span class="input-group-btn" title="add a new menu">
              <button type="submit" class="btn btn-default" name="postDocument"><i class="fa fa-upload"></i></button>
            </span>
          </div>
        </div>
      </form>
    </h2>
    @if(Session('err') !== NULL)
      <div class="col-md-12">
        <div class="alert alert-warning">
           <span class="text-danger"> {{Session('err')}}</span>
        </div>
      </div>
    @endif
    <div id="documents" class="col-md-12 w3-padding-0">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Documents list</h3>
              <form class="form form-horizontal">
                  <select id="filtre" name="country" class="form-control input-sm">
                      <option value="">Country</option>
                      @foreach($countries as $c)
                      <option value="{{ $c->code}}">{{ $c->name}}</option>
                      @endforeach
                  </select>
              </form>
          </div>
          <div class="panel-body">

            <div>
              @if(isset($documents))
                <ul class="w3-ul">
                  @foreach($documents as $doc)
                    <div class=" w3-pale-green w3-round-medium w3-leftbar w3-rightbar w3-border-grey">
                      <a title="delete" href="{{route('admin::delete.document', ['id'=>$doc->id])}}" class="w3-closebtn " data-toggle="jconfirm"><span class="fa fa-trash  w3-text-orange w3-margin-4"></span> </a>
                      <h4 class="document w3-small w3-padding" data-url="{{asset('uploads/documents/'.$doc->name)}}" data-code="{{$doc->country_code}}">
                        <img src="{{$doc->image}}" alt="" />
                        <span class="fa fa-book fa-2x  w3-text-theme"></span>
                        <span class="w3-margin-left" style="vertical-align: 6px">{{$doc->name}}</span> <br>
                      </h4>
                    </div><br>
                  @endforeach
                </ul>
              @else
                <p>nothing found</p>
              @endif
            </div>
          </div>
          <div class="panel-footer"></div>
        </div>
      </div>
      <div class="col-md-8">
          <iframe id="document-reader" src="" class="col-md-12 w3-padding-0 w3-grey w3-border" width="100%" height="400px"></iframe>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
    $(document).ready(function (){
       $('.document').click(function (){
          $('#document-reader').attr('src', $(this).attr('data-url'));
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
