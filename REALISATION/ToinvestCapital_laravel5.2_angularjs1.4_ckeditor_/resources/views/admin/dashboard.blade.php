@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <h2 class="w3-border-bottom w3-padding w3-bottombar">List of last added Articles
        <a style="border: 2px solid #444"  onclick="document.getElementById('add-article-form').style.display = 'block'" title="new article"  class="btn btn-default w3-theme-light w3-wide pull-right"><span class="mif-plus">&nbsp;</span>New</a>
    </h2>

    <div id="articles" class="col-md-12">
        @if(isset($articles))
        <table id="articles-table" class="table table-hover table-stripped">
            <legend></legend>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Visibility</th>
                    <th>Country</th>
                    <th>Menu</th>
                    <th>Language</th>
                    <th>Published</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($articles as $a)
                <tr>
                    <td title="">{{ $a->title }}</td>
                    <td>{{ $a->account_name }}</td>
                    <td>{{ $a->country_name }}</td>
                    <td>{{ $a->menu_name_en }}</td>
                    <td>{{ $a->language_name }}</td>
                    <td>{{ $a->published? 'yes':'no' }}</td>

                    <td style="width: 200px;">
                        <a class="btn btn-default" title="show details" href="#"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-default" title="modify" href="{{ route('admin::update.article', [$a->slug])}}"><span class="fa fa-edit"></span></a>
                        <a class="btn btn-default" data-toggle="jconfirm" title="delete" href="{{ action('ArticleController@delete', ['slug'=>$a->slug])}}"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6">No articles</td></tr>
                @endforelse
            </tbody>
        </table>
        @endif
    </div>
</div>

<div class="col-md-12">
    <h3 class="w3-border-bottom w3-padding w3-bottombar">List of Addons</h3>

    <div class="row">

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Menu</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="{{ route('admin::post.addons')}}" method="post">
                                              {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">New Menu</label>
                            <div class="input-group">
                                <input type="text" name="name_en" class="form-control" id="exampleInputEmail3" maxlength="50" placeholder="name in English">
                                <input type="text" name="name_fr" class="form-control" id="exampleInputEmail3" maxlength="50" placeholder="name in French">
                                <span class="input-group-btn" title="add a new menu">
                                    <button type="submit" class="btn btn-default" name="postMenu"><i class="fa fa-plus-circle"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div>
                        @if(isset($menus))
                        <ul class="w3-ul">
                            @foreach($menus as $m)
                            <li><span>{{$m->name_en}}</span><span class="pull-right">
                                    <a class="btn clickable no-padding" ><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                    <a class="btn clickable no-padding" href="{{url('dashboard/menu/'.$m->id.'/delete')}}" data-toggle="jconfirm"><i class="fa fa-remove"></i></span></li></a>
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
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Accounts</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="{{ route('admin::post.addons') }}" method="post">
                      {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">New account</label>
                            <div class="input-group">
                                <input name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="name">
                                <span class="input-group-btn" title="add a new account level">
                                    <button type="submit" class="btn btn-default" name="postAccount"><i class="fa fa-plus-circle"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div>
                        @if(isset($accounts))
                        <ul class="w3-ul">
                            @foreach($accounts as $m)
                            <li><span>{{$m->name}}</span><span class="pull-right">
                                    <a class="btn clickable no-padding" ><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                    <a class="btn clickable no-padding" href="{{url('dashboard/account/'.$m->id.'/delete')}}" data-toggle="jconfirm"><i class="fa fa-remove"></i></span></li></a>
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

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Languages</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="{{ route('admin::post.addons') }}" method="post">
                      {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">New Languages</label>
                            <div class="input-group">
                                <input name="code" type="text" class="form-control" id="exampleInputEmail3" placeholder="code, ex:FR for french">
                                <input name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="name">
                                <span class="input-group-btn" title="add a new language">
                                    <button type="submit" class="btn btn-default" name="postLanguage"><i class="fa fa-plus-circle"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div>
                        @if(isset($languages))
                        <ul class="w3-ul">
                            @foreach($languages as $m)
                            <li><span>{{$m->name}}</span><span class="pull-right">
                                    <a class="btn clickable no-padding" ><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                    <a class="btn clickable no-padding" href="{{url('dashboard/language/'.$m->code.'/delete')}}" data-toggle="jconfirm"><i class="fa fa-remove"></i></span></li></a>
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
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Countries</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="{{ route('admin::post.addons') }}" method="post">
                      {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">New Countries</label>
                            <div class="input-group">
                                <input name="code" type="text" class="form-control" id="exampleInputEmail3" placeholder="code, ex:CMR for cameroon">
                                <input name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="name">
                                <span class="input-group-btn" title="add a new country">
                                    <button type="submit" class="btn btn-default" name="postCountry"><i class="fa fa-plus-circle"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div>
                        @if(isset($countries))
                        <ul class="w3-ul">
                            @foreach($countries as $m)
                            <li><span>{{$m->name}}</span><span class="pull-right">
                                    <a class="btn clickable no-padding" ><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                    <a class="btn clickable no-padding" href="{{url('dashboard/country/'.$m->code.'/delete')}}" data-toggle="jconfirm"><i class="fa fa-remove"></i></span></li></a>
                            @endforeach
                        </ul>
                        @else
                        <p>il n'y a aucun Menu inséré</p>
                        @endif
                    </div>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>

</div>

@endsection
