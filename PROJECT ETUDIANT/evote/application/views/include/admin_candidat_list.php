

<div class="row">
    <section  class="col-md-12">


        <?php include_once 'admin_sidebar.php'  ?>


        <div class="col-md-offset-2 col-md-7">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <table class="table table-responsive" id="tabcandidat">
                <caption><h1 class="pull-left">Liste des Candidats</h1>
                    <a class="pull-right" href="<?= base_url('index.php/admin/candidat/membre') ?>">
                        <button type="button" class="btn btn-default">
                            Voir / Ajouter des Membres au Bureau
                        </button>
                    </a>
                </caption>

                <thead>
                <th>#</th>
                <th>face</th>
                <th>Nom complet</th>
                <th>voies</th>
                <th>slogan</th>
                <th>Action</th>
                </thead>


                <tbody>

                <?php
                if (isset($candidats)):
                    $i = 1;
                    foreach ($candidats as $candidat):
                        ?>
                        <tr>
                            <td style="background-color: <?=$candidat['couleur']?>;"><?php echo $i //($candidat['id']) ?> </td>
                            <td><img src="<?=(base_url('images/photo/' . $candidat['photo'])) ?>" alt="avatar" width="36px"> </td>
                            <td><?php echo ($candidat['sexe'] == 'f' ? 'Mme' : 'Mr') .' '. $candidat['nom'] .' ' . $candidat['prenom'] ?> </td>
                            <td><?php echo($candidat['nbreVoie']) ?> </td>
                            <td style="max-width: 200px; overflow: scroll; white-space: nowrap"><?php echo($candidat['slogan']) ?> </td>
                            <td style="text-align: center; min-width: 100px;"><a
                                    href="<?= base_url('index.php/admin/candidat/edit/' . $candidat['id']) ?>">
                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Editer">
                                        <i class="glyphicon glyphicon-wrench"></i>
                                    </button>
                                </a>
                                <a href="<?= base_url('index.php/admin/candidat/del/' . $candidat['id']) ?>">
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="supprimer">
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
                <a href="<?= base_url('index.php/admin/candidat/add') ?>">
                    <button type="button" class="btn">
                        Ajouter candidat
                    </button>
                </a>
            </div>
        </div>
    </section>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>





