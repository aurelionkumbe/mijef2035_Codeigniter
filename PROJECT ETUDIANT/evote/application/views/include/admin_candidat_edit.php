<div class="row">
    <section class="col-md-12">


        <?php include_once 'admin_sidebar.php' ?>


        <div class="col-md-offset-2 col-md-7">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <div class="well">

                <?php if (isset($candidat)) : ?>
                    <div class="col-md-12">
                        <div class="col-md-9">
                            <h1>Ajouter un candidat !</h1>
                            <p><a href="<?php echo base_url('index.php/admin/home') ?>">< retour</a></p>
                        </div>
                        <div class="col-md-3 pull-right" style="text-align: center;">
                            <img src="<?php echo base_url('images/photo/' . $candidat['photo']) ?>" alt="ma photo"
                                 style="width: 124px; height: 124px" class="img-thumbnail img-circle"/>
                        </div>
                    </div>
                    <form action="<?php echo base_url('index.php/admin/candidat/edit') ?>" method="post"
                          accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="row" hidden>
                            <input name="id" class="form-control" type="hidden" value="<?php echo $candidat['id'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label for="PostName">Nom :</label>
                                    <input name="nom" class="form-control" type="text" placeholder="Le nom"
                                           value="<?php echo $candidat['nom'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label for="prenom">Prenom :</label>
                                    <input name="prenom" class="form-control" type="text" placeholder="Le prenom "
                                           value="<?php echo $candidat['prenom'] ?>"/>
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
                                    <input type="date" name="dateNais" class="form-control" placeholder="AAAA-MM-jj"
                                           value="<?php echo($candidat['dateNaissance']) ?>"/>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" name="mail" placeholder="L'email" class="form-control"
                                           value="<?php echo($candidat['email']) ?>"/>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email2">Verify Email :</label>
                                    <input type="text" name="mail2" placeholder="Confirmer l'email" class="form-control"
                                           value="<?php echo($candidat['email']) ?>"/>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slogan">slogan :</label>
                                    <input type="text" name="slogan" placeholder="Slogan" class="form-control" value="<?php echo($candidat['slogan']) ?>"/>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="couleur">couleur :</label>
                                    <input type="color" name="couleur" class="form-control" value="<?php echo($candidat['couleur']) ?>"/>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone">Telephone :</label>
                                    <input type="text" name="telephone" placeholder="6xx xxx xxx" class="form-control"
                                           value="<?php echo($candidat['telephone']) ?>"/>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo :</label>
                                    <input type="hidden" name="photo_recover" class="form-control"
                                           value="<?php echo($candidat['photo']) ?>"/>
                                    <input type="file" name="photo" class="form-control"
                                           value="<?php echo($candidat['photo']) ?>"/>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="commentaire">commentaire :</label>
                                    <textarea name="commentaire" class="form-control" rows="3">
                                        <?php echo($candidat['commentaire']) ?>
                                    </textarea>
                                </div>

                            </div>
                        </div>


                        <div class="submit">
                            <button class="btn btn-primary" name="enregistrer">Enregistrer</button>
                        </div>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    </section>
</div>





