<div class="col-md-12">

    <h1 class="" >Elements supprimés

        <a href="javascript:void(0)" class="btn btn-primary pull-right" role="button"><i class="mif-arrow-up-left">&nbsp;</i> Restaurer</a>
        <a href="javascript:void(0)" class="btn btn-default pull-right" role="button"><i class="mif-cancel">&nbsp;</i> Annuler la selection</a>
    </h1>

</div>
<p>&nbsp;</p>

<div class="col-md-12">
 <?php if (isset($corbeille) && !empty($corbeille)): ?>
    <?php foreach ($corbeille as $bin): ?>
    <?php if (isset($bin['numero'])): ?>
    <div class="thumbnail tile tile-wide tile-orange" style="position:relative;">
        <span class="mif-file-text mif-4x" style="position: absolute; top: 8px;left: 8px;"></span>
        <h3 title="<?= $bin['nom'].' '.$bin['prenom'] ?>" class="tile-text">
            <?= $bin['numero']?><br>
            <small><?= $bin['date_enreg']?></small>
        </h3>
        <small><?= $bin['objet']?></small>
        <a href="<?=site_url('rapports/restaurer/rapport/'.$bin['numero'])?>" title="restaure cet element" style="position: absolute; bottom: 8px;right: 8px;">
            <span class="mif-undo mif-3x" ></span>
        </a>
    </div>
    <?php elseif(isset($bin['id_p'])): ?>    
    <div class="thumbnail tile tile-wide tile-orange" style="position:relative;">
        <span class="mif-user mif-4x" style="position: absolute; top: 8px;left: 8px;"></span>
            <h3 class="tile-text">
                <?= $bin['nom_p'].' '.$bin['prenom'] ?><br>
                <small><?= $bin['nom_e']?></small>
            </h3>
        <small><?= $bin['email']?></small>
        <a href="<?=site_url('rapports/restaurer/personne/'.$bin['id_p'])?>" title="restaure cet element" style="position: absolute; bottom: 8px;right: 8px;">
            <span class="mif-undo mif-3x" ></span>
        </a>
    </div>
         <?php endif ?>
<?php endforeach ?>
<?php else: ?>
    <p style="padding: 24px" class="text-center fg-red bg-white"><span class="mif-info mif-4x"></span>&nbsp; la Corbeille est encore vide.</p>
<?php endif ?>

</div>