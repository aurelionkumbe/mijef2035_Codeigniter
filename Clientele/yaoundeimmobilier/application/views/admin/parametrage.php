
<div class="wrapper">
    <?php include_once "aside.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="parametres-wrapper">
        <section class="content-header">
            <h1>
                Parametres
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Parametres</li>
            </ol>
        </section>
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Parametrage du site</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" method="POST">
                                    <input type="hidden" name="ID" value="<?php echo $parametre->ID ?>">
                                    <div class="form-group">
                                        <label for="Nom_site" class="col-sm-2 control-label">Nom</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Nom_site" name="Nom_site" placeholder="Nom site" value="<?= $parametre->Nom_site?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Slogan" class="col-sm-2 control-label">Slogan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Slogan" name="Slogan" placeholder="Slogan site" value="<?= $parametre->Slogan?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Adresse" class="col-sm-2 control-label">Adresse</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Adresse" name="Adresse" placeholder="Adresse" value="<?= $parametre->Adresse?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Boite_postale" class="col-sm-2 control-label">BP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Boite_postale" name="Boite_postale" placeholder="Boite postale" value="<?= $parametre->Boite_postale?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="Email_commercial" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="Email_commercial" name="Email_commercial" placeholder="Email commercial" value="<?= $parametre->Email_commercial?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Email_public" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="Email_public" name="Email_public" placeholder="Email public" value="<?= $parametre->Email_public?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Tel1" class="col-sm-2 control-label">Tel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Tel1" name="Tel1" placeholder="Tel1" value="<?= $parametre->Tel1?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Tel1" class="col-sm-2 control-label">Tel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Tel2" name="Tel2" placeholder="Tel2" value="<?= $parametre->Tel2?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Tel3" class="col-sm-2 control-label">Tel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Tel3" name="Tel3" placeholder="Tel3" value="<?= $parametre->Tel3?>">
                                        </div>
                                    </div>

                                    <br>
                                    <p>Affichage</p>
                                    <div class="form-group">
                                        <label for="Nombre_affichage" class="col-sm-2 control-label">Nombre affichage</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Nombre_affichage" name="Nombre_affichage" placeholder="Nombre d'immobilier a afficher" value="<?= $parametre->Nombre_affichage?>">
                                        </div>
                                    </div>
                                    <p>Compte de connexion de l'administrateur</p>
                                    <div class="form-group">
                                        <label for="Login" class="col-sm-2 control-label">Login</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Login" name="Login" placeholder="Login" value="<?= $parametre->Login?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Mot_passe" class="col-sm-2 control-label">nouveau code</label>
                                        <div class="col-sm-10 input-group">
                                            <input type="password" class="form-control" id="Mot_passe" name="Mot_passe" placeholder="Nouveau Mot passe" value="<?= $parametre->Mot_passe?>">
                                            <div class="input-group-addon" id="affMdp">Afficher</div>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="saveParam" class="btn btn-danger">Mettre a jour</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
</div>


<script>
    $(function () {

        $('body').addClass('hold-transition skin-blue sidebar-mini');
        $('#affMdp').hover(function () {
          $('#Mot_passe').attr('type', 'text')
        }, function () {
            $('#Mot_passe').attr('type', 'password')
        })
    });
</script>