<?php include_once 'partial/head.php' ?>
<?php include_once 'partial/header.php' ?>

    <div id="middle" class="middle row">
        <section class="col-md-10 col-md-offset-1">
            <h4>Liste des candidats enrgistrés au vote <small></small></h4>
            <?php
            if (isset($candidats) && isset($membres)):
                $i = 1;
                foreach ($candidats as $candidat):
                ?>
               <div class="candidat well well-sm">
                   <?php //var_dump($candidat) ?>
                   <div class="bg-warning" style="padding: 12px; background-color: #E8D2FF">
                       <div>
                           <h2 class="" style="display: inline;" ><?php echo $i . '&nbsp;-&nbsp;&nbsp;'  ?></h2>
                           <img class="img-rounded img-thumbnail" style="height: 78px; width: auto; vertical-align: middle" src="<?= base_url('images/photo/' .  $candidat['photo']) ?>" alt="">
                       <div style="font-size: 21px; display: inline"><?php  echo $candidat['nom'] .' ' . $candidat['prenom'] ?>
                           <small> , <?=''//$candidat['slogan']?></small>
                       </div>
                       <span class="pull-right badge" style="font-size: 18px; background-color: <?php  echo $candidat['couleur']?>;">
                           <button class="btn btn-default btn-sm" data-toggle="collapse" data-target="<?= '#candidat_n' . $candidat['id']?>" aria-expanded="false" aria-controls="<?= 'candidat_n' . $candidat['id']?>" style="color: <?php  echo $candidat['couleur']?>;">
                               <i class="caret"></i>&nbsp;Mon bureau</button>
                       </span>
                       </div>

                       <div class="collapse" id="<?= 'candidat_n' . $candidat['id']?>">
                           <p>&nbsp;</p>
                           <div class="well">
                               <?php
                               foreach ($membres as $membre):
                                   if ($candidat['id'] === $membre['candidat_id']):
                                       ?>
                                       <h4><?= $membre['poste'] . ' : ' . $membre['nom']?></h4>
                                       <?php
                                   endif;
                               endforeach;
                               ?>
                           </div>
                       </div>
                   </div>
               </div>
                <?php
                $i++;
            endforeach;
            endif;
            ?>
        </section>
    </div>
<?php include_once 'partial/footer.php' ?>
<?php include_once 'partial/foot.php' ?>