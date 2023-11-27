<div id="profile-card" class="col-md-4 bg-lime ">
    <h3 class="text-left" style="color: #f8ffd6"> je suis <b><?=$me['nom_personne'] .' '.$me['prenom']?></b> employé comme <b><?=$me['nom_fonction']?></b> à <b><?=$me['nom_entreprise']?></b></h3>
    <div class="col-md-10" style="padding: 0;padding-right: 12px; ">
        <div>Autres informations :</div>
        <span>Telephone : <?=$me['tel']?></span><br>
        <span>Email : <?=$me['email']?></span><br>
    </div>
    <div class="col-md-2 text-center"  style="padding: 0"><a class="btn tile tile-orange pull-right" href="<?=site_url('login/signout')?>">
            <span class="mif-switch mif-4x fg-red"></span>
            <br>deconnexion</a></div>
    <p>&nbsp;</p>
</div>

<p>&nbsp;</p>
<div class="col-md-5 col-md-offset-3">
    <?php echo form_open('rapports/modifier_profile', 'class="form" id="modifier-profile"'); ?>
    <? $show =  isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ? true : false?>
    <div class="alert alert-warning alert-dismissible" role="alert" <?= $show ? '' : 'hidden'?>>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Attention!&nbsp;</strong><?= $show ? $_SESSION['erreur'] : ''; unset($_SESSION['erreur']);?>
    </div>
    <fielset>
        <legend>
            <input type="checkbox" style="display: inline-block !important; height: 20px; width:20px; vertical-align:top;" id="changer-infos-connex" name="changerInfosConnex">
            changer les informations de connexion</legend>
        <div class="form-group">
            <div class="input-group">
                <label for="email-personne" class="input-group-addon">Email  &nbsp;</label>
                <input type="text" class="form-control" id="email-personne" placeholder="<?=$me['email']?>" value="<?=$me['email']?>" name="emailPers">
            </div>
            <div class="input-group">
                <label for="mtp-personne" class="input-group-addon">Ancien</label>
                <input type="text" class="form-control" id="mdp-personne" placeholder="ancien mot de passe" name="ancienMdp">
                <label for="nouveau-mtp-personne" class="input-group-addon">Nouveau</label>
                <input type="text" class="form-control" id="nouveau-mdp-personne" placeholder="nouveau mot de passe" name="nouveauMdp">

            </div>
        </div>
    </fielset>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="col-md-4 pull-right">
        <input type="submit" class="btn btn-primary btn-block " name="modifierProfile" value="Enregistre">
    </div>
    <?php echo form_close(); ?>
</div>