<p>&nbsp;</p>
<div class="container">
    <?php echo validation_errors(); ?>
    <h1 class="w3-text-red w3-opacity">Gestion des livres</h1>

    <div class="navbar col-md-12">

        <!-- Trigger/Open the Modal -->
        <button onclick="document.getElementById('auteur-form').style.display = 'block'"
                class="w3-btn w3-theme-d4"><i class="mif-plus"></i> Auteur</button>

        <!-- The Modal -->
        <div id="auteur-form" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('auteur-form').style.display = 'none'"
                          class="w3-closebtn">&times;</span>
                    <h4 class="form-signin-heading">Ajouter un auteur</h4>
                    <form class="form-signin"   method="post" id="addAuthorForm" action="<?= site_url('admin/add/auteur') ?>">
                        <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
                        <div>
                            <label><input type="radio" name="sexe" checked value="m">Homme</label>
                            <label><input type="radio" name="sexe" value="f">Femme</label>
                        </div>
                        <input type="text" class="form-control" placeholder="pays" name="pays">
                        <input type="submit" id="add-author" name="addAuthor" value="Ajouter" class="btn btn-primary">   
                    </form>    
                </div>
            </div>
        </div>
        <button onclick="document.getElementById('edition-form').style.display = 'block'"
                class="w3-btn w3-theme-d4"><i class="mif-plus"></i> Edition</button>

        <!-- The Modal -->
        <div id="edition-form" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('edition-form').style.display = 'none'"
                          class="w3-closebtn">&times;</span>
                    <h4 class="form-signin-heading">Ajouter une edition</h4>
                    <form class="form-signin" method="post" id="add-edition-form" action="<?= site_url('admin/add/edition') ?>">
                        <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
                        <input type="text" class="form-control" placeholder="pays" name="pays">
                        <input type="submit" id="add-edition" name="addEdition" value="Ajouter" class="btn btn-primary">   
                    </form>    
                </div>
            </div>
        </div>

        <button onclick="document.getElementById('categorie-form').style.display = 'block'"
                class="w3-btn  w3-theme-d4"><i class="mif-plus"></i> Categorie</button>

        <!-- The Modal -->
        <div id="categorie-form" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('categorie-form').style.display = 'none'"
                          class="w3-closebtn">&times;</span>
                    <h4 class="form-signin-heading">Ajouter une categorie</h4>
                    <form class="form-signin" method="post" id="add-categorie-form"   action="<?= site_url('admin/add/categorie') ?>">
                        <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
                        <input type="submit" id="add-categorie" name="addCategorie" value="Ajouter" class="btn btn-primary">   
                    </form>    
                </div>
            </div>
        </div>

        <button onclick="document.getElementById('catalogue-form').style.display = 'block'"
                class="w3-btn  w3-theme-d4"><i class="mif-plus"></i> Catalogue</button>

        <!-- The Modal -->
        <div id="catalogue-form" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('catalogue-form').style.display = 'none'"
                          class="w3-closebtn">&times;</span>
                    <h4 class="form-signin-heading">Ajouter un catalogue</h4>
                    <form class="form-signin" method="post" id="add-catalogue-form"   action="<?= site_url('admin/add/catalogue') ?>" >

                        <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
                        <input type="submit" id="add-catalogue" name="addCatalogue" value="Ajouter" class="btn btn-primary">   
                    </form>    
                </div>
            </div>
        </div>





    <div id="load"></div>
        <p>&nbsp;</p>

    <ul id="admin-nav" data-container="#admin-nav-content" class="nav nav-tabs nav-justified w3-bottombar w3-border-green w3-light-green w3-card-2">
        <li class="active"><a href="#livre" class="w3-theme-d3">Livre&nbsp;
                <button id="add-book-btn"  onclick="$('#w-livre').window('open')" type="button" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="bottom" title="Ajouté un nouveau livre">
                    <span class="glyphicon glyphicon-plus">Nouveau</span>
                </button></a></li>
        <li><a href="#emprunt">Emprunt
                <button id="add-loan-btn"  onclick="$('#w-location').window('open')" type="button" class="btn btn-md btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ajouté un nouveau emprunt" hidden>
                    <span class="glyphicon glyphicon-plus" data-toggle="confirm">Nouveau</span>
                </button></a></li>
        <li class=""><a href="#personne">Personne
                <button id="add-person-btn"  onclick="$('#w-personne').window('open')" type="button" class="btn btn-md btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ajouté une nouvelle personne" hidden>
                    <span class="glyphicon glyphicon-plus">Nouveau</span>
                </button>
            </a></li>
    </ul>
    <br>

    <div id="admin-nav-content">
        <div id="livre" class="col-md-12">
            <?php include_once VIEWPATH . 'layouts/table_of_book.php' ?>      
        </div>
        <div id="emprunt" class="col-md-12" hidden>
            <?php include_once VIEWPATH . 'layouts/table_of_loan.php' ?>
        </div>
        <div id="personne" class="col-md-12" hidden>
            <?php include_once VIEWPATH . 'layouts/table_of_person.php' ?>
        </div>
    </div>
</div>


<!-- Button trigger modal -->

<script src="" type="text/javascript" charset="utf-8" async defer>
                    jQuery(document).ready(function ($) {
                        alert('hello');
                        $('<button id="add-book-btn" type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#add-book-form-modal">Ajouter un Livre</button>')
                                .appendTo('#livre');
                    });
</script>

<div class="row" hidden> 
    <div id="w-livre"class="easyui-window" title="Ajouter un livre" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:80%; min-width: 300px; height:500px;padding:10px;">
        <?php include_once VIEWPATH . 'layouts/add_book_form.php' ?>
    </div>
    <div id="w-location" class="easyui-window" title="Ajouter un emprunt" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width: 60%; min-width:500px;height:500px;padding:10px;">    
        <?php include_once VIEWPATH . 'layouts/add_loan_form.php' ?>
    </div>

    <div id="w-personne" class="easyui-window" title="Ajouter une personne" data-options="modal:true,closed:true" style="width: 60%; min-width: 500px;height:500px;padding:10px;">
        <?php include_once VIEWPATH . 'layouts/add_person_form.php' ?>
    </div>
</div>

<?php include_once VIEWPATH . 'layouts/modals.php' ?>