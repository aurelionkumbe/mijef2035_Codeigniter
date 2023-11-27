<div class="row">
    <section class="col-md-12">


        <?php include_once 'admin_sidebar.php' ?>


        <div class="col-md-offset-2 col-md-7">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <table class="table table-responsive">
                <caption><h1>Liste des Electeurs</h1></caption>
                <thead>
                <th>#</th>
                <th>Nom complet</th>
                <th><?php echo ' deja Voté?'; ?></th>
                <th><?php echo 'email'; ?></th>
                <th>matricule</th>
                <th>Actions</th>
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
                            <td><?php echo $electeur['dejaVote'] == 1 ? 'oui' : 'non';?> </td>
                            <td><?php echo $electeur['email'] ?> </td>
                            <td style="max-width: 200px; overflow: scroll"><?php echo $electeur['matricule'] ?> </td>
                            <td style="text-align: center; min-width: 100px">
                                <a
                                    href="<?= base_url('index.php/admin/electeur/edit/' . $electeur['id']) ?>">
                                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                            data-placement="left" title="Editer">
                                        <i class="glyphicon glyphicon-wrench"></i>
                                    </button>
                                </a>
                                <a href="<?= base_url('index.php/admin/electeur/del/' . $electeur['id']) ?>">
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip"
                                            data-placement="right" title="supprimer">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    $i++;
                    endforeach;
                endif;
                ?>
                </tbody>
            </table>
            <div>
                <a href="<?= base_url('index.php/admin/home') ?>">
                    <button type="button" class="btn">
                        retour
                    </button>
                </a>
                <a href="<?= base_url('index.php/admin/electeur/add') ?>">
                    <button type="button" class="btn">
                        Ajouter electeur
                    </button>
                </a>
            </div>
        </div>
    </section>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>






