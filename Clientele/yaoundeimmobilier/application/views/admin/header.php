<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Console</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu open">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <!--img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"-->
                    <span class="hidden-xs">Menu</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header" style="height: 4em;">
                        <!--img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"-->
                        <p>Ajouter un contenu</p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <a class="btn btn-primary btn-link" href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'">Immobilié</a>

                            </div>
                            <div class="col-xs-6 text-center">
                                <a class="btn btn-primary btn-link"  href="javascript:void(0)" onclick="document.getElementById('id02').style.display='block'">Proprietaire</a>
                            </div>
                            <br><br>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?=base_url('console/parametrages')?>" class="btn btn-default btn-flat"><i class="fa fa-cogs"></i> Parametrage</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?=base_url('console/logout')?>" class="btn btn-danger pull-right">Deconnexion</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        </div>
    </nav>
</header>



<!-- The Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content" style="    padding-left: 4em;">
        <div class="w3-container">
      <span onclick="document.getElementById('id01').style.display='none'"
            class="w3-closebtn text-red">&times;</span>
            <h2 class="text-blue"><u>Ajouter un nouveau bien immobilié</u> </h2>
            <br>
            <div class="tab-pane" id="">
                <?= form_open_multipart(base_url("console"), 'class="form-horizontal" id="immobilier-form"')?>

                <div class="form-group whenterrain">
                    <label for="Type" class="col-sm-2 control-label">Type *</label>
                    <div class="col-sm-10">
                        <select name="TypeID"  class="form-control"  id="Type"  data-toggle="select2">
                            <?php
                            foreach ($types as $t){
                                echo "<option   value='$t->ID' >$t->Libelle</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group whenterrain">
                    <label for="ProprietaireID" class="col-sm-2 control-label">Proprietaire</label>
                    <div class="col-sm-10 input-group">
                        <select name="ProprietaireID"  class="form-control"  id="ProprietaireID" data-toggle="select2" style="min-width: 5rem">
                            <?php
                            foreach ($proprietaires as $x){
                                echo "<option value='$x->ID' >$x->Nom $x->Prenom</option>";
                            }
                            ?>
                        </select>
                        <div class="input-group-btn">
                        <button class=" btn btn-default" onclick="document.getElementById('id02').style.display='block'"><i class="fa fa-plus-circle"></i></button>
                        </div>
                    </div>
                </div>

                <div class="form-group whenterrain">
                    <label for="Localisation" class="col-sm-2 control-label">Localisation </label>
                    <div class="col-sm-10">
                                        <textarea name="Localisation"  class="form-control"  id="Localisation" cols="30" rows="10">
                                        </textarea>
                    </div>
                </div>

                <div class="form-group whenterrain" >
                    <label for="Quartier" class="col-sm-2 control-label">Quartier *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Quartier" name="Quartier" placeholder="Quartier" >
                    </div>
                </div>
                <div class="form-group whenterrain">
                    <label for="Ville" class="col-sm-2 control-label">Ville</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Ville" name="Ville" placeholder="Ville" >
                    </div>
                </div>
                <div class="form-group whenterrain">
                    <label for="Valeur" class="col-sm-2 control-label">Valeur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Valeur" name="Valeur" placeholder="Valeur" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="Etat" class="col-sm-2 control-label">Etat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Etat" name="Etat" placeholder="Etat" >
                    </div>
                </div>

                <div class="form-group whenterrain">
                    <label for="Prix_vente" class="col-sm-2 control-label">Prix_vente</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Prix_vente" name="Prix_vente" placeholder="Prix_vente" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="Prix_location" class="col-sm-2 control-label">Prix_location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Prix_location" name="Prix_location" placeholder="Prix_location" >
                    </div>
                </div>

                <div class="form-group" style="padding-left: 10em">
                    <div class="checkbox">
                        <label class=""> A_louer
                            <input type="checkbox"  id="A_louer" name="A_louer" placeholder="A_louer">
                        </label>
                    </div>
                </div>
                <div class="form-group whenterrain" style="padding-left: 10em">
                    <div class="checkbox">
                        <label class=""> A_vendre
                            <input type="checkbox"  id="A_vendre" name="A_vendre" placeholder="A_vendre" >
                        </label>
                    </div>
                </div>

                <div class="form-group whenterrain">
                    <label for="Description" class="col-sm-2 control-label">Description *</label>
                    <div class="col-sm-10">
                                        <textarea name="Description"  class="form-control"  id="Description" cols="30" rows="10">
                                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Autres_infos" class="col-sm-2 control-label">Autres</label>
                    <div class="col-sm-10">
                                        <textarea name="Autres_infos"  class="form-control"  id="Autres_infos" cols="30" rows="10">
                                        </textarea>
                    </div>
                </div>
                <div class="form-group whenterrain well well-sm" style="padding-left: 10em">
                    <div class="checkbox">
                        <label for="Est_visible" class=""> Rendre public
                            <input type="checkbox"  id="Est_visible" name="Est_visible" checked>
                        </label>
                    </div>
                </div>
                <div class="form-group whenterrain">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="create_construction" class="btn btn-danger btn-lg">Creer</button>
                    </div>
                </div>
                <?= form_close()?>
            </div>
            <!-- /.tab-pane -->
            <br><br>
        </div>
    </div>
</div>

<div id="id02" class="w3-modal">
    <div class="w3-modal-content" style="    padding-left: 4em;">
        <div class="w3-container">
      <span onclick="document.getElementById('id02').style.display='none'"
            class="w3-closebtn">&times;</span>
            <h2>Ajouter un nouveau proprietaire</h2>
            <br><br>
            <?= form_open_multipart(base_url('console'), 'class="form-horizontal"')?>

            <input type="hidden" name="ID" value="<?php echo '' ?>">

            <div class="form-group">
                <label for="Nom" class="col-sm-2 control-label">Nom *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom" value="<?= ''?>">
                </div>
            </div>

            <div class="form-group">
                <label for="Prenom" class="col-sm-2 control-label">Prenom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prenom" value="<?= ''?>">
                </div>
            </div>

            <!--div class="form-group" >
                <label for="Prenom" class="col-sm-2 control-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="Photo" name="Photo" placeholder="Photo" value="<?= ''?>">
                </div>
            </div-->

            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" value="<?= ''?>">
                </div>
            </div>

            <div class="form-group">
                <label for="Quartier" class="col-sm-2 control-label">Quartier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Quartier" name="Quartier" placeholder="Quartier" value="<?= ''?>">
                </div>
            </div>

            <div class="form-group">
                <label for="Tel1" class="col-sm-2 control-label">Tel *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Tel1" name="Tel1" placeholder="Tel1" value="<?= ''?>">
                </div>
            </div>

            <div class="form-group">
                <label for="Tel1" class="col-sm-2 control-label">Tel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Tel2" name="Tel2" placeholder="Tel2" value="<?= ''?>">
                </div>
            </div>

            <div class="form-group">
                <label for="Tel3" class="col-sm-2 control-label">Tel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Tel3" name="Tel3" placeholder="Tel3" value="<?= ''?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="create_proprietaire" class="btn btn-danger">Creer</button>
                </div>
            </div>
            <?= form_close()?>

        </div>
    </div>
</div>
