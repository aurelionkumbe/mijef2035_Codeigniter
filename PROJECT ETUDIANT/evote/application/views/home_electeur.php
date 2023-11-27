<?php include_once 'partial/head.php' ?>
<?php include_once 'partial/header.php' ?>

    <div id="middle" class="middle row">
        <section class="col-md-10 col-md-offset-1">
            <table class="table table-responsive">
                <caption><h1>Liste des Electeurs</h1></caption>
                <thead>
                <th>#</th>
                <th>Nom complet</th>
                <th hidden><?php echo ' deja Voté?'; ?></th>
                <th><?php echo 'email'; ?></th>
                <th>matricule</th>
                </thead>


                <tbody>
                <?php
                if (isset($electeurs)):
                    $i = 1;
                    foreach ($electeurs as $electeur):
                        ?>
                        <tr>
                            <td><?php echo $i // $electeur['id'] ?> </td>
                            <td><?php echo ($electeur['sexe'] == 'f' ? 'Mme' : 'Mr') .' '. $electeur['nom'] . ' ' . $electeur['prenom']  ?> </td>
                            <td hidden><?php echo $electeur['dejaVote'] == 1 ? 'oui' : 'non';?> </td>
                            <td><?php echo $electeur['email'] ?> </td>
                            <td style="max-width: 200px; overflow: scroll"><?php echo $electeur['matricule'] ?> </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                endif;
                ?>
                </tbody>
            </table>
        </section>
    </div>
<?php include_once 'partial/footer.php' ?>
<?php include_once 'partial/foot.php' ?>