@extends('layouts.admin')

@section('content')
<div class="col-md-12">

    <h2 class="w3-border-bottom w3-padding w3-bottombar">List of Articles (Weekly bulletin)
        <a  style="border: 2px solid #444"  onclick="document.getElementById('add-article-form').style.display = 'block'" title="new article"  class="btn btn-default pull-right"><span class="mif-plus">&nbsp;</span>New</a>
    </h2>

    <div id="articles" class="col-md-12">
        @if(isset($articles))
        <table id="articles-table" class="table table-hover table-stripped">
            <legend></legend>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Menu</th>
                    <th>Account</th>
                    <th>Country</th>
                    <th>Language</th>
                    <th>Published</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($articles as $a)
                <tr>
                    <td title="">{{ $a->title }}</td>
                    <td>{{ $a->menu_name_en }}</td>
                    <td>{{ $a->account_name }}</td>
                    <td>{{ $a->country_name }}</td>
                    <td>{{ $a->language_name }}</td>
                    <td>{{ $a->published == 0 ? 'no':'yes' }}</td>
                    <td style="width: 200px;">
                        <a class="btn btn-default hidden" title="show details" href="#"><span class="fa fa-eye"></span></a>
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
@endsection
