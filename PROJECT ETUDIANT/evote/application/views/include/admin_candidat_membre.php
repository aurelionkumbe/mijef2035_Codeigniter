<div class="row">
    <section class="col-md-12">


        <?php include_once 'admin_sidebar.php' ?>


        <div class="col-md-offset-2 col-md-9">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <div class="well">
                <h1>Ajouter des membres du bureau a un candidat !</h1>

                <p><a href="<?php base_url('index.php/admin/home') ?>">< retour</a></p>

                <?php
                if (isset($_SESSION['erreur'])) echo '<div class="alert alert-warning">' . $_SESSION["erreur"] . '</div>';
                unset($_SESSION['erreur']);
                ?>
                <p>&nbsp;&nbsp;</p>

                <form action="#" method="post" accept-charset="utf-8" class="form-horizontal">
                    <?php
                    for ($i = 1; $i <= 11; $i++):
                        ?>
                        <div class="row">
                            <div class="form-goup col-md-12">
                                <div class="input-group">
                                    <label class="input-group-addon">
                                        <b><?= $i ?></b>&nbsp;-&nbsp;<input type="checkbox" name="select<?= $i ?>"
                                                                            value="oui" checked>
                                    </label>
                                    <label for="nom<?= $i ?>" class="input-group-addon control-label">
                                        Nom complet
                                    </label>
                                    <input type="text" class="form-control" name="nom<?= $i ?>" id="nom<?= $i ?>"
                                           placeholder="Nom" required>
                                    <label for="sexe<?= $i ?>" class="input-group-addon">
                                        sexe
                                    </label>
                                    <select name="sexe<?= $i ?>" class="form-control" id="sexe<?= $i ?>">
                                        <option value="H">homme</option>
                                        <option value="F">femme</option>
                                    </select>
                                    <label for="poste<?= $i ?>" class="input-group-addon">
                                        Poste
                                    </label>
                                    <select name="poste<?= $i ?>" class="form-control" id="poste<?= $i ?>">
                                        <option value="vice president">Vice president</option>
                                        <option value="Secretaire general">Secretaire general</option>
                                        <option value="Secretaire general adjoint">Secretaire general adjoint</option>
                                        <option value="tresorerie">Tresorerie</option>
                                        <option value="commisaire aux comptes 1">Commisaire aux comptes</option>
                                        <option value="commisaire aux comptes 2">Commisaire aux comptes</option>
                                        <option value="delegue GL">Delegue GL</option>
                                        <option value="delegue SR">Delegue SR</option>
                                        <option value="delegue sport">Delegue sport</option>
                                        <option value="delegue culturel">Delegue culturel</option>
                                        <option value="cordonnateur de clubs">Cordonnateur de clubs</option>
                                    </select>
                                    <label for="candidat<?= $i ?>" class="input-group-addon">
                                        Candidat
                                    </label>
                                    <select name="candidatId<?= $i ?>" class="form-control" id="candidat<?= $i ?>">
                                        <?php
                                        if (isset($candidats)):
                                            foreach ($candidats as $candidat):
                                                ?>
                                                <option
                                                    value="<?= $candidat['id'] ?>"><?= $candidat['nom'] . ' ' . $candidat['prenom'] ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <?php
                    endfor;
                    ?>
                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" name="enregistrer">Enregistrer</button>
                        </div>
                    </div>
                </form>


            </div>

            <hr>

            <div class="col-md-12">
                <table class="table table-responsive">
                    <caption><h2>Liste des membres enregistés</h2></caption>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>nom complet</th>
                        <th>sexe</th>
                        <th>poste</th>
                        <th>candidat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($membres)  && isset($candidats)):
                        foreach ($membres as $membre):
                            ?>
                            <tr>
                                <td><?= $membre['id'] ?></td>
                                <td><?= $membre['nom'] ?></td>
                                <td><?= $membre['sexe'] ?></td>
                                <td><?= $membre['poste'] ?></td>
                                <td><?php
                                    foreach ($candidats as $key => $candidat){
                                        if($membre['candidat_id'] == $candidat['id']){
                                            echo '<img width="36px" src="'.base_url('images/photo/' . $candidat["photo"]) . '" alt="' . $candidat["id"] . '">' . ' ' . $candidat['nom'] . ' ' . $candidat['prenom'];
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>




