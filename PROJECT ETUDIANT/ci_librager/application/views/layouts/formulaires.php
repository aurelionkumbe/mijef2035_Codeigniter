<form class="form-signin"  method="post" id="addCategorieForm" action="<?=site_url('admin/add/categorie')?>"  hidden>
    <h4 class="form-signin-heading">ajouter categorie</h4>
    <input type="text" id="nom" class="form-control" placeholder="nom" name="nom" autofocus>
</form>    


<form class="form-signin" method="post" id="addCatalogueForm" action="<?=site_url('admin/add/catalogue')?>"  hidden>
    <h4 class="form-signin-heading">ajouter catalogue</h4>
    <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
    <button  hidden class="btn btn-lg btn-primary btn-block" type="button">Inserer</button>
</form>    


<form class="form-signin" method="post" id="addAuthorForm" action="<?=site_url('admin/add/auteur')?>" hidden>
    <h4 class="form-signin-heading">ajouter auteur</h4>
    <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
    <input type="text" class="form-control" placeholder="prenom" name="prenom" >
    <label><input type="radio" name="sexe" checked value="m">Homme</label>
    <label><input type="radio" name="sexe" value="f">Femme</label>
    <input type="text" class="form-control" placeholder="pays" name="pays">
</form>    


<form class="form-signin" method="post" id="addEditionForm" action="<?=site_url('admin/add/edition')?>" hidden>
    <h4 class="form-signin-heading">ajouter Edition</h4>
    <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
    <input type="text" class="form-control" placeholder="pays" name="pays">
</form>    


<form class="form-signin" method="post" id="addRayonForm" action="<?=site_url('admin/add/rayon')?>" hidden>
    <h4 class="form-signin-heading">ajouter un Rayon</h4>
    <input type="text" class="form-control" placeholder="nom" name="nom" autofocus>
</form>    
