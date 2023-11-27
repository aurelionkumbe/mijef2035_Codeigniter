@extends('layouts.admin')


@section('content')

<div class="col-md-12">

    <h1>List of Articles
        <a style="border: 2px solid #444" title="new article" href="<?= ('administration/add/article') ?>" class="btn btn-default btn-lg pull-right"><span class="mif-plus">&nbsp;</span>New</a>
    </h1>

    <div id="articles" class="col-md-12">
       
<div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">List group item heading</h4>
    <p class="list-group-item-text">...</p>
  </a>
</div>
        @if(!isset($articles))
            <table class="table table-hover table-stripped">
            <legend></legend>
                <thead>
                    <tr>
                        <th>title</th>
                        <th>language</th>
                        <th>menu</th>
                        <th>level</th>
                        <th>Country</th>
                        <th>published</th>
                        <th>disabled</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {articles}
                    <tr>
                        <td title="">{titre}</td>
                        <td>{intitule_l}</td>
                        <td>{intitule_m}</td>
                        <td>{libelle}</td>
                        <td>{intitule_p}</td>
                        <td>{published}</td>
                        <td>{deleted}</td>
                        <td style="width: 200px;">
                            <a class="btn btn-default" title="voir les details" href="<?= ('administration/article/{id_a}') ?>"><span class="fa fa-eye"></span></a>
                            <a class="btn btn-default" title="modifier" href="<?= ('administration/update/article/{id_a}') ?>"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-default" data-toggle="jconfirm" title="supprime" href="<?= ('administration/del/article/{id_a}') ?>"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    {/articles}
                </tbody>
            </table>
        @endif
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

        </div>
        <div class="col-md-3"></div>
    </div>

        </div> <!-- /container -->
@endsection

