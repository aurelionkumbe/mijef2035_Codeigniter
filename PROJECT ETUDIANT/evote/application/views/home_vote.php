<?php include_once 'partial/head.php' ?>
<?php include_once 'partial/loggedin_header.php' ?>
<?php
if(isset($_SESSION['erreur'])) echo '<div class="row alert alert-warning">'. $_SESSION['erreur'] .'</div>';
?>

<!-- /.row -->
<div id="middle" class="middle row">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div><h1 class="text-center text-info">Veuillez selectionner un candidat
        <br><small>cliquez sur la photo pour voter</small></h1>
    </div>
    <p>&nbsp;</p>
    
    <section class="col-md-10 col-md-offset-1">
        <div class="imvote">
            <?php
            if (isset($candidats) && isset($membres)) :
                foreach ($candidats as $candidat):
                    ?>

                    <figure class="col-md-3">
                        <a href="<?= base_url('index.php/home/vote/' . $candidat['id']) ?>">
                            <img class="img-rounded img-thumbnail" data-toggle="tooltip" data-placement="top" title="<?=$candidat['slogan']?>" src="<?= base_url('images/photo/' . $candidat['photo']) ?>"/>
                        </a>
                        <figcaption style="background-color: <?= $candidat['couleur']?>; color: greenyellow;">
                            <p style="padding: 12px">
                                <span style="max-width: 120px ">
                                    <b><?= ($candidat['sexe'] == 'F') ? 'Mme ' . $candidat['nom'] : 'Mr ' . $candidat['nom']; ?></b>
                                    </span><br>
                                <span style=""  class="text-center">
                                <?= $candidat['slogan'] ?>
                                    </span><br>
                            </p>
                        </figcaption>
                        <div class="collapse" id="<?= 'candidat_n' . $candidat['id'] ?>">
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
                    </figure>


                    <?php
                endforeach;
            endif;
            ?>

            <figure class="col-md-3">
                <a href="<?= base_url('index.php/home/vote/none')?>">
                    <img class="img-rounded img-thumbnail" data-toggle="tooltip" data-placement="top" title="je le bulletin null" src="<?= base_url('images/photo/bulletinnull.png') ?>"/>
                </a>
                <figcaption style="background-color: greenyellow;">
                    <p style="padding: 12px; font-size: 18px; color:#fff" class="text-center">
                        <span ><b>Bulletin NULL</b></span>
                        <span class="pull-right" hidden>
                                    <a href="#" class="btn btn-info btn-sm">detail</a>
                        </span>
                    </p>


                </figcaption>
            </figure>
        </div>
    </section>
</div>


<?php include_once 'partial/footer.php' ?>
<?php include_once 'partial/foot.php' ?>

