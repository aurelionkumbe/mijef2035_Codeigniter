@extends('layouts.admin')

@section('content')

<div id="update-article-form" class="">
    <div class="col-md-12">

        @if(isset($article))
        <h3 class="w3-bottombar w3-border-bottom w3-padding">Updating</h3>
        <form method="post" class="form form-horizontal" id="add-article-form" action="{{action('ArticleController@update', ['slug'=>$article->slug])}}">
            <input type="hidden" name="_method" value="PUT" >
            <div class="row">
                <div class="col-md-4">

                    <label for="article-title">Title :</label>
                    <input name="article[title]" id="article-title" class="form-control" value="{{$article->title}}" maxlength="255" type="text" required="required">

                </div>
                <div class="col-md-4">

                    <label>Publish now :</label>
                    <div class="checkbox form-control">
                        @if($article->published)
                        <label for="article-published-yes">
                            <input id="article-publisher-yes" checked="" type="radio" value="1" name="article[published]" />Yes
                        </label>
                        <label for="article-published-no">
                            <input id="article-published-no" type="radio" value="0" name="article[published]" />No
                        </label>
                        @else
                        <label for="article-published-yes">
                            <input id="article-publisher-yes" checked="" type="radio" value="1" name="article[published]" />Yes
                        </label>
                        <label for="article-published-no">
                            <input id="article-published-no" type="radio" checked="" value="0" name="article[published]" />No
                        </label>
                        @endif
                    </div>

                </div>
                <div class="col-md-4">

                    <label for="article-menu">Appear in:</label>
                    <select name="article[menu_id]" class="form-control" id="article-menu">
                        @if(isset($menus))
                        <option value="-1">-- select a Menu --</option>
                        <optgroup label="Menus">
                            @foreach($menus as $m)
                            <option {{$m->id == $article->menu_id?'selected':''}} value="{{$m->id}}">{{$m->name_en}}</option>
                            @endforeach
                        </optgroup>
                        @else
                        <p>nothing found</p>
                        @endif
                    </select>

                </div>
                <div class="col-md-4">

                    <label for="article-account">Account permission level :</label>
                    <select name="article[account_id]" class="form-control" id="article-account">
                        @if(isset($accounts))
                        <option value="-1">-- select a Account --</option>
                        <optgroup label="Accounts">
                            @foreach($accounts as $m)
                            <option {{$m->id == $article->account_id?'selected':''}} value="{{$m->id}}">{{$m->name}}</option>
                            @endforeach
                        </optgroup>
                        @else
                        <p>nothing found</p>
                        @endif
                    </select>


                </div>

                <div class="col-md-4">

                    <label for="article-language">Language :</label>
                    <select name="article[language_code]" class="form-control" id="article-language">
                        @if(isset($languages))
                        <option value="-1">-- select a language --</option>
                        <optgroup label="Languages">
                            @foreach($languages as $m)
                            <option {{$m->code == $article->language_code?'selected':''}} value="{{$m->code}}">{{$m->name}}</option>
                            @endforeach
                        </optgroup>
                        @else
                        <p>nothing found</p>
                        @endif
                    </select>

                </div>
                <div class="col-md-4">

                    <label for="article-country">Country :</label>

                    <select name="article[country_code]" class="form-control" id="article-country">
                        @if(isset($countries))
                        <option value="-1">-- select a country --</option>
                        <optgroup label="Countries">
                            @foreach($countries as $m)
                            <option {{$m->code == $article->country_code?'selected':''}}  value="{{$m->code}}">{{$m->name}}</option>
                            @endforeach
                        </optgroup>
                        @else
                        <p>nothing found</p>
                        @endif
                    </select>

                </div>
                                <div class="col-md-4">

                    <br>
                    <label for="article-image" class="form-control text-center w3-btn"><i class="fa fa-upload"></i> upload cover Image</label>
                    <input class="hidden" type="file" name="article[image]" id="article-image" size="1" />

                </div>

            </div>
            <p>&nbsp;</p>
            <div class="row required">
                <label for="article-presentation">Presentation on the cover :</label>
                <textarea name="article[presentation]" class="form-control" cols="30" rows="2" id="article-presentation" required="required">#
                {{$article->presentation}}
                </textarea>
            </div>
            <p>&nbsp;</p>
            <div class="row required">
                <label for="article-content">Content :</label>
                <textarea name="article[content]" class="ckeditor form-control" cols="30" rows="6" id="article-content" required="required">#
                {{$article->content}}
                </textarea>
            </div>

            <!-- enable ckeditor in a div
                        <div class="form-group required">
                            <label for="PostContent">Content Editor:</label>
                            <div id="editor">
                                <h1>Hello world!</h1>
                                <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
                            </div>
                        </div>
            -->
            <br>
            <div class="submit">
                <input class="btn btn-primary btn-lg" type="submit" name="addNewArticle" value="Update Now">
            </div>
            <br>
            <br>

        </form>
        @else
        <p>&nbsp;</p>
        <p class="w3-jumbo">Cet article n'existe pas</p>

        @endif
    </div>
</div>

@endsection
