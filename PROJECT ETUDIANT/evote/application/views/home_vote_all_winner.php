<?php include_once 'partial/head.php' ?>
<?php
if (isset($_SESSION['erreur'])) echo '<div class="row alert alert-warning">' . $_SESSION['erreur'] . '</div>';


?>


<!-- /.row -->
<div id="middle" class=" row">
    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <div>
        <h1 class="text-center text-info">Les candidats ayant participés au vote
            <br>
            <small></small>
        </h1>
    </div>
    <p>&nbsp;</p>

    <div class="col-md-offset-1 col-md-10">

        <p>&nbsp;</p>

        <section class="col-md-12">
            <h4>Status des candidats
                <small>classement actuel</small>
            </h4>
            <?php
            if (isset($candidats) && isset($membres)):
                $i = 1;
                $totalVoie = 0;
                foreach ($candidats as $candidat):
                    $totalVoie += $candidat['nbreVoie'];
                    ?>
                    <div class="candidat well well-sm">
                        <?php //var_dump($candidat)
                        ?>
                        <div class="bg-warning" style="padding: 12px; background-color: #E8D2FF">
                            <h2 class="" style="display: inline;"><?php echo $i . '&nbsp;-&nbsp;&nbsp;' ?></h2>
                            <img class="img-rounded img-thumbnail"
                                 style="height: 78px; width: auto; vertical-align: middle"
                                 src="<?= base_url('images/photo/' . $candidat['photo']) ?>" alt="">
                                    <span
                                        style="font-size: 21px;"><?php echo $candidat['nom'] . ' ' . $candidat['prenom'] ?>
                                    </span>

                            <div class="pull-right col-md-6">
                                         <span class="badge"
                                               style="font-size: 18px; background-color: <?= $candidat['couleur'] ?>;">Voies : <?php echo $candidat['nbreVoie'] ?>
                                             / Taux : <?php echo ($candidat['nbreVoie'] / $statistic['sve']) * 100 ?> %
                                    </span>
                                        <span class="badge pull-right"
                                              style="font-size: 18px; background-color: <?= $candidat['couleur'] ?>;">
                                   <button class="btn btn-default btn-sm" data-toggle="collapse"
                                           data-target="<?= '#candidat_n' . $candidat['id'] ?>" aria-expanded="false"
                                           aria-controls="<?= 'candidat_n' . $candidat['id'] ?>"
                                           style="color: <?= $candidat['couleur'] ?>;"><i class="caret"></i>&nbsp;Mon
                                       bureau
                                   </button>
                                    </span>
                            </div>
                            <div class="collapse" id="<?= 'candidat_n' . $candidat['id'] ?>">
                                <p>&nbsp;</p>

                                <div class="well">
                                    <?php
                                    foreach ($membres as $membre):
                                        if ($candidat['id'] === $membre['candidat_id']):
                                            ?>
                                            <h4><?= $membre['poste'] . ' : ' . $membre['nom'] ?></h4>
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

        <div class="row text-right">
            <section class="col-md-10 col-md-offset-1">
                <p>&nbsp;</p>

                <div class="pull-left">
                    <h4>Nombre d'electeur : <span
                            class="badge"><?= isset($statistic) ? $statistic['nbElecteur'] : 'xx'; ?></span></h4>
                    <h4>Nombre de votant : <span
                            class="badge"><?= isset($statistic) ? $statistic['nbVotant'] : 'xx'; ?></span></h4>
                    <h4>Taux participation : <span
                            class="badge"><?= isset($statistic) ? $statistic['tauxParticipation'] : 'xx'; ?> %</span>
                    </h4>
                </div>
                <div class="pull-right">
                    <h4><span title="surfrage valable exprimé">SVE</span>: <span
                            class="badge"><?= isset($statistic) ? $statistic['sve'] : 'xx'; ?></span></h4>
                    <h4>Nombre de bulletin nul : <span
                            class="badge"><?= isset($statistic) ? $statistic['nbBulletinNull'] : 'xx'; ?></span></h4>
                </div>
            </section>
        </div>

        <hr>

    </div>

    
    <?php include_once 'partial/footer.php' ?>

<?php include_once 'partial/foot.php' ?>

