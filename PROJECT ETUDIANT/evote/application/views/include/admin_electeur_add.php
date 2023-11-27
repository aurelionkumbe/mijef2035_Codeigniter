<div class="row">
    <section class="col-md-12">


        <?php include_once 'admin_sidebar.php' ?>


        <div class="col-md-offset-2 col-md-7">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <div class="well">

                <h1>Ajouter un electeur !</h1>

                <p><a href="<?= base_url('index.php/admin/electeur') ?>">< retour</a></p>

                <div class="row" style="text-align: center;">
                    <?php
                    if (isset($_SESSION['erreur'])) {
                        echo '<div class="alert alert-warning">' . $_SESSION['erreur'] . '</div>';
                    }
                    unset($_SESSION['erreur']);
                    ?>


                </div>



                <form action="#" method="post" accept-charset="utf-8" class="formulaire">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="PostName">Nom :</label>
                                <input name="nom" class="form-control" type="text" placeholder="Le nom" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="prenom">Prenom :</label>
                                <input name="prenom" class="form-control" type="text" placeholder="Le prenom " required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6" hidden>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="text" name="mail" placeholder="L'email" class="form-control"/>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexe">Sexe : </label>
                                <div class="form-control">
                                    <label for="sexe">
                                        <input type="radio" value="H" name="sexe" checked/>
                                        Masculin
                                    </label>
                                    <label for="sexe">
                                        <input type="radio" value="F" name="sexe"/>
                                        Feminin
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row" hidden>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateNais">Date de naissance:</label>
                                <input type="date" name="dateNais" class="form-control" placeholder="AAAA/MM/JJ"/>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email2">Email :</label>
                                <input type="text" name="mail2" placeholder="Confirmer l'email" class="form-control"/>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Telephone :</label>
                                <input type="text" name="telephone" placeholder="6xx xxx xxx" class="form-control"/>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cni">Numero CNI :</label>
                                <input type="text" name="cni" placeholder="numero carte" class="form-control"/>
                            </div>

                        </div>
                    </div>


                    <div class="submit">
                        <button class="btn btn-primary" name="enregistrer">Enregistrer</button>
                    </div>
                </form>


            </div>

        </div>
    </section>
</div>


