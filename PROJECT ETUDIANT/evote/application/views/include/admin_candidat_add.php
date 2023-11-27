
<div class="row">
    <section  class="col-md-12">


        <?php include_once 'admin_sidebar.php'  ?>


        <div class="col-md-offset-2 col-md-7">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="well">
                <h1>Ajouter un candidat !</h1>

                <p><a href="<?php base_url('index.php/admin/home') ?>">< retour</a></p>

                <?php
                    if (isset($erreur)) echo '<div class="alert alert-warning">'. $erreur . '</div>'
                ?>

                <form action="#" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="PostName">Nom :</label>
                                <input name="nom" class="form-control" type="text" placeholder="Le nom">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="prenom">Prenom :</label>
                                <input name="prenom" class="form-control" type="text" placeholder="Le prenom ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexe">Sexe : </label>
                                <label for="masculin">
                                    <input type="radio" value="H" name="sexe" checked/>
                                    masculin
                                </label>
                                <label for="feminin">
                                    <input type="radio" value="F" name="sexe"/>
                                    masculin
                                </label>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateNais">Date de naissance:</label>
                                <input type="date" name="dateNais" class="form-control" placeholder="AAAA-MM-jj"/>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="text" name="mail" placeholder="L'email" class="form-control"/>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email2">Email :</label>
                                <input type="text" name="mail2" placeholder="Confirmer l'email" class="form-control"/>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slogan">slogan :</label>
                                <input type="text" name="slogan" placeholder="Slogan" class="form-control"/>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="couleur">couleur :</label>
                                <input type="color" name="couleur" class="form-control"/>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Telephone :</label>
                                <input type="text" name="telephone" placeholder="6xx xxx xxx" class="form-control"/>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo">Photo :</label>
                                <input type="file" name="photo" class="form-control"/>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="commentaire">Briefing :</label>
                                <textarea name="commentaire" class="form-control" rows="3" maxlength="500"></textarea>
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




