<div class="row">
    <section class="col-md-12">


        <?php include_once 'admin_sidebar.php' ?>


        <div class="col-md-offset-2 col-md-7">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <div class="well">
                <?php
                if (isset($electeur)):
                    ?>
                    <h1>Modifier un electeur !</h1>

                    <p><a href="<?= base_url('index.php/admin/electeur') ?>">< retour</a></p>

                    <div class="row " style="text-align: center;">
                        <?php
                        if (isset($erreur)) {
                            echo '<div class="error">' . $erreur . '</div>';
                        }
                        ?>


                    </div>



                    <form action="#" method="post" accept-charset="utf-8" class="formulaire">
                        <div class="row" hidden>
                            <input type="hidden" name="id_post" value="<?php echo($electeur['id']) ?>" >
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label for="PostName">Nom :</label>
                                    <input name="nom" class="form-control" type="text" placeholder="Le nom"
                                           value="<?php echo($electeur['nom']) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label for="prenom">Prenom :</label>
                                    <input name="prenom" class="form-control" type="text" placeholder="Le prenom "
                                           value="<?php echo($electeur['prenom']) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sexe">Sexe : </label>
                                    <label for="sexe">
                                        <input type="radio" value="<?php echo($electeur['sexe']) ?>" name="sexe"
                                               checked/>
                                        Masculin
                                    </label>
                                    <label for="sexe">
                                        <input type="radio" value="<?php echo($electeur['sexe']) ?>" name="sexe"/>
                                        Feminin
                                    </label>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dateNais">Date de naissance:</label>
                                    <input type="date" name="dateNais" class="form-control" placeholder="AAAA/MM/JJ"
                                           value="<?php echo($electeur['dateNaissance']) ?>"/>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" name="mail" placeholder="L'email" class="form-control"
                                           value="<?php echo($electeur['email']) ?>"/>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email2">Email :</label>
                                    <input type="text" name="mail2" placeholder="Confirmer l'email" class="form-control"
                                           value="<?php echo($electeur['email']) ?>"/>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone">Telephone :</label>
                                    <input type="text" name="telephone" placeholder="6xx xxx xxx" class="form-control"
                                           value="<?php echo($electeur['telephone']) ?>"/>
                                </div>

                            </div>

                        </div>


                        <div class="submit">
                            <button class="btn btn-primary" name="enregistrer">Enregistrer</button>
                        </div>
                    </form>
                    <?php
                else:
                    echo '<p>&nbsp;</p><h1 STYLE="font-size: 48px; color: #003300">OUPS !!!</h1>';
                    echo '<p>&nbsp;</p>';
                    echo '<h1 class="alert alert-info text-center"> Cet electeur n\'est pas enregisté </h1>';
                endif;
                ?>

            </div>
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>
        </div>
    </section>
</div>

