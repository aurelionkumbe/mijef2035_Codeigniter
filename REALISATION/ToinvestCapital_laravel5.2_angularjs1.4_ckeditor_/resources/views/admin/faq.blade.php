@extends('layouts.admin')

@section('content')
<div class="col-md-12">

    <h2 class="w3-border-bottom w3-padding w3-bottombar">FAQ (Frequently Asked Questions)
        <a style="border: 2px solid #444"  onclick="document.getElementById('add-faq-form').style.display = 'block'" title="new faq"  class="btn btn-default pull-right"><span class="mif-plus">&nbsp;</span>New</a>
    </h2>

    <div id="faqs" class="col-md-12">
        @if(isset($faqs))
        @foreach($faqs as $f)
        <div class="w3-container  <?php echo ($f->responce)? 'w3-pale-green' : 'w3-pale-red' ?> w3-round-medium w3-leftbar w3-rightbar w3-border-grey">
            <a title="delete this faq" href="{{route('admin::delete.faq', ['id'=>$f->id])}}" class="w3-closebtn " data-toggle="jconfirm"><span class="fa fa-remove w3-margin"></span> </a>
            <h4 class="faq w3-padding">
                <span class="fa fa-question-circle fa-2x  w3-text-theme"></span><span class="w3-margin-left" style="vertical-align: 6px">{{$f->question}}</span> <br>
            </h4>
            @if($f->responce)
            <p class="w3-padding-ver-16">{{$f->responce}}</p>
            @else
            <form action="{{route('admin::patch.faq')}}" class="form form-inline" method="post" style="width: 100%; position: relative; top: -6px;">
                {{csrf_field()}}
                <input type="hidden" name="__method" value="patch">
                <input type="hidden" name="id" value="{{$f->id}}">
                <input type="text" class="form-control" placeholder="Response" name="responce" >
                <button  class="btn w3-theme" type="submit"><i class="fa fa-just"></i> update</button>
            </form>
            @endif
        </div><br>

        @endforeach
        @endif
    </div>
</div>
<div id="add-faq-form" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <h3 style="display: inline-block">Add a new faq</h3>
            <span onclick="document.getElementById('add-faq-form').style.display = 'none'"
            class="w3-closebtn">&times;</span>
            <div class="col-md-12">


                <form method="post" class="form form-horizontal" id="add-faq-form" action="{{action('FaqController@create')}}">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="faq-question">Question :</label>
                            <input name="faq[question]" id="faq-question" class="form-control" maxlength="255" type="text" required="required">

                        </div>
                        <div class="col-md-12">
                            <br>
                            <label for="faq-responce" class="form-control text-center w3-btn"><i class="fa fa-rebel"></i> Responce</label>
                            <textarea class="form-control" type="text" name="faq[responce]" id="faq-responce">
                            </textarea> 
                        </div>

                    </div>
                    <p>&nbsp;</p>

                    <div class="submit">
                        <input class="btn btn-primary btn-lg" type="submit" name="addNewfaq" value="Add this FAQ">
                    </div>

                </form>
                <p>&nbsp;</p>

            </div>
        </div>
    </div>
</div>
@endsection

