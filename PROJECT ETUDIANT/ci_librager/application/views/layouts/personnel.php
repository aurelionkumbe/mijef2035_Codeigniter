<div class="col-md-12">
    <h1 >Liste des employés deja enregistrés
        <a href="javascript:void(0)" class="btn btn-primary pull-right" onclick="$('#w-ajouter-personne').window('open')"><i class="mif-plus">&nbsp;</i> Personne</a>
        <a href="javascript:void(0)" hidden="" class="btn btn-primary pull-right" onclickk="$('#w-ajouter-fonction').window('open')"><i class="mif-plus">&nbsp;</i> Fonction</a>
    </h1>
</div>
<table class="table table-hover table-striped">
    <caption></caption>
    <thead>
    <tr>
        <td>&nbsp;</td>
        <td>Nom & Prenom</td>
        <td>Fonction</td>
        <td>Telephone</td>
        <td>Email</td>
        <td  data-toggle="tooltip" data-position="top">date enreg.</td>
        <td title="action">&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($personnes) && !empty($personnes)): ?>
        <?php foreach ($personnes as $p): ?>
            <tr class="rapport  <?=($p['id'] == $_SESSION['myId'])? 'fg-lime':''?>" id="<?=$p['id']?>">
                <td><a style="padding: 0;" title="editer" class="btn disabled <?=$p['est_admin']? 'fg-red':''?>" type="button"><span class="mif-user mif-2x"></span></a></td>
                <td ><?=$p['nom_p'].' '.$p['prenom']?></td>
                <td ><?=$p['libelle_f']?></td>
                <td ><?=$p['tel']?></td>
                <td ><?=$p['email']?></td>
                <td ><?=$p['date_enreg']?></td>
                <td class="btn-group">
                    <a hidden="" title="imprimer" class="btn" type="button"><span class="mif-printer"></span></a>
                    <a title="editer" href="<?=  site_url('personne/modifier/'.$p['id_p'])?>" href="<?=site_url('personne/editer/'.$p['id_p'])?>"  onclick="$('#w-personne-edit').window('open')" class="btn edit" type="button"><span class="mif-pencil"></span></a>
                    <a title="supprimer" class="btn remove" data-toggle="jconfirm" href="<?=site_url('personne/supprimer/'.$p['id_p'])?>"><span class="mif-bin"></span></a></td>
            </tr>
            <tr id="<?=$p['id'].'-detail'?>" class="detail" hidden>
                <td style="cursor: default; background-color:whitesmoke !important;" colspan="5">
                </td>
            </tr>
        <?php endforeach ?>
    <?php else: ?>
        <tr><td colspan="7" class="text-center fg-red">Aucunes personnes trouvées</td></tr>
    <?php endif ?>
    </tbody>
</table>


<!--  LES BOITES MODALES  -->

<div id="w-ajouter-personne" class="easyui-window bg-lightOlive" data-options="title:'Employer',inline:true,closed:true" style="width:460px;height:480px;padding:10px">
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
                <input type="text" class="form-control" id="nom-personne" placeholder="nom" value="" name="user[nom]">
                <label for="prenom-personne" class="input-group-addon">Prenom</label>
                <input type="text" class="form-control" id="prenom-personne" placeholder="prenom" value="" name="user[prenom]">
            </div>
            <div class="input-group">
                <label for="email-personne" class="input-group-addon">Email</label>
                <input type="text" class="form-control" id="email-personne" placeholder="email" value="" name="user[email]">
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
                <input type="tel" class="form-control" id="telephone-personne"   placeholder="" name="user[tel]">
            </div>
            <div style="padding: 0; margin: 0;"  class="input-group">
                <div class="btn-group" data-toggle="">
                    <label style="padding: 5px 12px; margin: 0;" class="btn btn-primary active">
                        <br>
                        <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-warning ">
      <input type="radio" name="user[est_admin]" value="1" id="option2" autocomplete="off"> oui
  </label>
  <label class="btn btn-warning active">
      <input type="radio" name="user[est_admin]" value="0" id="option3" autocomplete="off" checked="" > non
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
        <input type="submit" class="btn btn-primary btn-block " name="ajouterpersonne" value="Inscrire">
    </div>
    <?php echo form_close(); ?>
</div>

