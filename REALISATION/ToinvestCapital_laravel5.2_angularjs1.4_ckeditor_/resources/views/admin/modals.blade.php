<?php
$menus = \ToInvestCapital\Menu::all();
$languages = \ToInvestCapital\Language::all();
$countries = \ToInvestCapital\Country::all();
$accounts = \ToInvestCapital\Account::all();

//var_dump($menus, $languages, $countries, $accounts);
 ?>
<div id="add-article-form" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('add-article-form').style.display = 'none'"
                  class="w3-closebtn">&times;</span>
            <div class="col-md-12">

                <h3>Add a new article</h3>
                <form method="post" class="form form-horizontal" id="add-article-form" action="{{action('ArticleController@create')}}">
              {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-4">

                            <label for="article-title">Title :</label>
                            <input name="article[title]" id="article-title" class="form-control" maxlength="255" type="text" required="required">

                        </div>
                        @if(0):
                        <div class="col-md-4">

                            <br>
                            <label for="article-image" class="form-control text-center w3-btn"><i class="fa fa-upload"></i> upload cover Image</label>
                            <input class="hidden" type="file" name="article[image]" id="article-image" size="1" />

                        </div>
                        <div class="col-md-4">

                            <label for="article-menu">Appear in:</label>
                            <select name="article[menu_id]" class="form-control" id="article-menu">
                                @if(isset($menus))
                                <option value="-1">-- select a Menu --</option>
                                <optgroup label="Menus">
                                    @foreach($menus as $m)
                                    <option value="{{$m->id}}">{{$m->name_en}}</option>
                                    @endforeach
                                </optgroup>
                                @else
                                <p>nothing found</p>
                                @endif
                            </select>

                        </div>
                      @endif

                        <div class="col-md-4">

                            <label>Publish now :</label>
                            <div class="checkbox form-control">
                                <label for="article-published-yes">
                                    <input id="article-publisher-yes" type="radio" value="1" name="article[published]" />Yes
                                </label>
                                <label for="article-published-no">
                                    <input id="article-published-no" type="radio" checked value="0" name="article[published]" />No
                                </label>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <label for="article-account">Account permission level :</label>
                            <select name="article[account_id]" class="form-control" id="article-account">
                                @if(isset($accounts))
                                <option value="-1">-- select a Account --</option>
                                <optgroup label="Accounts">
                                    @foreach($accounts as $m)
                                    <option value="{{$m->id}}">{{$m->name}}</option>
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
                                    <option value="{{$m->code}}">{{$m->name}}</option>
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
                                    <option value="{{$m->code}}">{{$m->name}}</option>
                                    @endforeach
                                </optgroup>
                                @else
                                <p>nothing found</p>
                                @endif
                            </select>

                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class="row">
                        <label for="article-presentatio">Presentation on the cover :</label>
                        <textarea name="article[presentation]" class="form-control" cols="30" rows="2" id="article-presentation" maxlength="150" required="required"></textarea>
                    </div>
                    <div class="row required">
                        <label for="article-content">Content :</label>
                        <textarea name="article[content]" class="ckeditor form-control" cols="30" rows="6" id="article-content" required="required"></textarea>
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

                    <div class="submit">
                        <input class="btn btn-primary btn-lg" type="submit" name="addNewArticle" value="Add this Article">
                    </div>

                </form>
                <p>&nbsp;</p>

            </div>
        </div>
    </div>
</div>
