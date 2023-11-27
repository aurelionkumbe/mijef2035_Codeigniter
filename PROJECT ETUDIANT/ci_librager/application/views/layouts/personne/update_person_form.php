<?php if(isset($person)):?>

<div id="update-person-form" class=" bg-lightOlive" data-options="title:'Employer',inline:true,closed:true" style="width:460px;height:480px;padding:10px">
    <?php echo form_open('personne/ajouter', 'class="form" id="modifier-profile"'); ?>
    <? $show =  isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ? true : false?>
    <div class="alert alert-warning alert-dismissible" role="alert" <?= $show ? '' : 'hidden'?>>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Attention!&nbsp;</strong><?= $show ? $_SESSION['erreur'] : ''; unset($_SESSION['erreur']);?>
    </div>
    <p>&nbsp;</p>
    <fielset>
        <div class="form-group">
            <div class="input-group">
                <label for="nom-personne" class="input-group-addon">Nom</label>
                <input type="text" class="form-control" id="nom-personne" placeholder="nom" value="<?=  test_value($person['nom'])?>" name="user[nom]">
                <label for="prenom-personne" class="input-group-addon">Prenom</label>
                <input type="text" class="form-control" id="prenom-personne" placeholder="prenom" value="<?=  test_value($person['prenom'])?>" name="user[prenom]">
            </div>
            <div class="input-group">
                <label for="email-personne" class="input-group-addon">Email</label>
                <input type="text" class="form-control" id="email-personne" placeholder="email" value="<?=$person['email']?>" name="user[email]">
            </div>
            <div class="input-group">
                <label class="input-group-addon" for="user-fonction">Fonction</label>
                <?php if (isset($fonctions)): ?>
                <select name="user[fonction_id]" id="user-fonction" class="form-control">
                <?php foreach($fonctions as $f): ?>
                    <option value="<?php echo $f['id']; ?>"><?php echo $f['libelle']; ?></option>
                <?php endforeach;?>
                </select>
                <?php endif; ?>
            </div>
         
            <div class="input-group">
                <label class="input-group-addon" for="user-entrprise">Entreprise</label>
                <?php if (isset($entreprises)): ?>
                <select name="user[entreprise_id]" id="user-entreprise" class="form-control">
                <?php foreach($entreprises as $e): ?>
                    <option value="<?php echo $e['id']; ?>"><?php echo $e['nom']; ?></option>
                <?php endforeach;?>
                </select>
                <?php endif; ?>
            </div>
            <div class="input-group">
                <label for="tel-personne" class="input-group-addon">Telephone</label>
                <input type="tel" class="form-control" id="telephone-personne" value="<?=$person['tel']?>"  placeholder="<?=$person['tel']?>" name="user[tel]">
            </div>
            <div style="padding: 0; margin: 0;"  class="input-group">
                <div class="btn-group" data-toggle="">
                    <label style="padding: 5px 12px; margin: 0;" class="btn btn-primary active">
                        <br>
                        <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-warning <?= isset($person['est_admin']) ? 'active' : '' ?>">
      <input type="radio" name="user[est_admin]" value="1" id="option2" autocomplete="off" <?= isset($person['est_admin']) ? 'checked' : '' ?> > oui
  </label>
  <label class="btn btn-warning <?= !isset($person['est_admin']) ? 'active' : '' ?>">
      <input type="radio" name="user[est_admin]" value="0" id="option3" autocomplete="off" <?= !isset($person['est_admin']) ? 'checked' : '' ?> > non
  </label>
</div>
 cliquez pour rendre administrateur
                    </label>
                </div>
            </div>
        </div>
    </fielset>
    <fielset>

        <div class="form-group">
            <div class="input-group">
                <label for="mdp-personne" class="input-group-addon">Mot de passe par defaut</label>
                <input type="text" class="form-control" disabled id="mdp-personne" placeholder="mot de passe" value="nouveaudigit" name="user[motdepasse]">
            </div>
        </div>
    </fielset>
    <p>&nbsp;</p>
    <div class="col-md-4 col-md-offset-4">
        <input type="submit" class="btn btn-primary btn-block " name="update_personne" value="Appliquer">
    </div>
    <?php echo form_close(); ?>
</div>


<?php else : redirect(site_url('rapport/consulter#personnel'))?>
<?php endif;?>