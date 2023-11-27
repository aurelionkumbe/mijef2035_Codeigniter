<div class="wrapper">
    <?php include_once "aside.php"?>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper" id="" >
        <section class="content-header">
            <h1>
                Construction
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Construction</li>
            </ol>
        </section>
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <?= isset($_SESSION['msg']) ? $_SESSION['msg'] :'' ?>

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mettre a jour </h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="tab-pane" id="settings">
                                <?= form_open_multipart(base_url("console/constructions/".$construction['ID']."/update"), 'class="form-horizontal"')?>

                                <input type="hidden" name="ID" value="<?php echo $construction['ID'] ?>">

                                <div class="form-group">
                                    <label for="Type" class="col-sm-2 control-label">Type *</label>
                                    <div class="col-sm-10">
                                        <select name="TypeID"  class="form-control"  id="Type"  data-toggle="select2">
                                            <?php
                                                foreach ($types as $t){
                                                    if ($t->ID == $construction['TypeID'] ) {
                                                        echo "<option  selected value='$t->ID' >$t->Libelle</option>";
                                                    }
                                                    else{
                                                        echo "<option   value='$t->ID' >$t->Libelle</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ProprietaireID" class="col-sm-2 control-label">Proprietaire</label>
                                    <div class="col-sm-10">
                                        <select name="ProprietaireID"  class="form-control"  id="ProprietaireID" data-toggle="select2">
                                            <?php
                                            foreach ($proprietaires as $x){

                                                if ($x->ID == $construction['ProprietaireID'] ) {
                                                    echo "<option selected value='$x->ID' >$x->Nom $x->Prenom</option>";
                                                }else{
                                                    echo "<option value='$x->ID' >$x->Nom $x->Prenom</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Localisation" class="col-sm-2 control-label">Localisation</label>
                                    <div class="col-sm-10">
                                        <textarea name="Localisation"  class="form-control"  id="Localisation" cols="30" rows="10">
                                            <?= $construction['Localisation'] ?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Quartier" class="col-sm-2 control-label">Quartier *</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Quartier" name="Quartier" placeholder="Quartier" value="<?= $construction['Quartier'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ville" class="col-sm-2 control-label">Ville</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Ville" name="Ville" placeholder="Ville" value="<?= $construction['Ville'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Valeur" class="col-sm-2 control-label">Valeur</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Valeur" name="Valeur" placeholder="Valeur" value="<?= $construction['Valeur'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Etat" class="col-sm-2 control-label">Etat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Etat" name="Etat" placeholder="Etat" value="<?= $construction['Etat']?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Prix_vente" class="col-sm-2 control-label">Prix_vente</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Prix_vente" name="Prix_vente" placeholder="Prix_vente" value="<?= $construction['Prix_vente']?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Prix_location" class="col-sm-2 control-label">Prix_location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Prix_location" name="Prix_location" placeholder="Prix_location" value="<?= $construction['Prix_location']?>">
                                    </div>
                                </div>

                                <div class="form-group" style="padding-left: 10em">
                                    <div class="checkbox">
                                        <label class=""> A_louer
                                            <input type="checkbox"  id="A_louer" name="A_louer" placeholder="A_louer" value="<?= $construction['A_louer'] ?>" <?= $construction['A_louer'] ? 'checked' : ''?>>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class=""> A_vendre
                                            <input type="checkbox"  id="A_vendre" name="A_vendre" placeholder="A_vendre" value="<?= $construction['A_vendre'] ?>" <?= $construction['A_vendre']  ? 'checked' : ''?>>
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="Description" class="col-sm-2 control-label">Description *</label>
                                    <div class="col-sm-10">
                                        <textarea name="Description"  class="form-control"  id="Description" cols="30" rows="10">
                                            <?= $construction['Description']?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Autres_infos" class="col-sm-2 control-label">Autres</label>
                                    <div class="col-sm-10">
                                        <textarea name="Autres_infos"  class="form-control"  id="Autres_infos" cols="30" rows="10">
                                            <?= $construction['Autres_infos']?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group well well-sm" style="padding-left: 10em">
                                    <div class="checkbox">
                                        <label for="Est_visible" class=""> Rendre public
                                            <input type="checkbox"  id="Est_visible" name="Est_visible" value="<?= $construction['Est_visible'] ?>" <?= $construction['Est_visible']  ? 'checked' : ''?>>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="update_construction" class="btn btn-danger btn-lg">Mettre a jour</button>
                                    </div>
                                </div>
                                <?= form_close()?>
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix text-center">

                            <h4>Photos</h4>
                            <?= form_open_multipart(base_url("console/constructions/".$construction['ID']."/update"), 'class="form-horizontal"')?>

                            <div class="form-group">
                                <label for="Photo0" class="col-sm-2 control-label">Principale</label>
                                <div class="col-sm-8">
                                    <input type="file"  class="form-control"  id="Photo0" name="Photo0" placeholder="Photo principale" >
                                </div>
                                <div class="col-sm-2" style="visibility: hidden">
                                    <img id="Photo0-img"  class="img-responsive" src="<?=base_url($construction['Photo0'])?>" alt="">
                                </div>
                            </div>

                            <?php for($i = 1 ; $i < 10 ; $i++): ?>

                                <div class="form-group">
                                    <label for="Photo<?=$i?>" class="col-sm-2 control-label">Photo<?=$i?></label>
                                    <div class="col-sm-8">
                                        <input type="file"  class="form-control"  id="Photo<?=$i?>" name="Photo<?=$i?>" placeholder="Photo">
                                    </div>
                                    <div class="col-sm-2" style="visibility: hidden;">
                                        <?php
                                                    /*
                                        $photo = $construction["Photo$i"];

                                        if ($photo != ""){
                                            $upload_data = json_decode($photo);
                                            //$this->dump($upload_data);
                                            //$file_name = $upload_data['file_name'];
                                            $ext = $upload_data->file_ext;
                                            $thumb = $upload_data->raw_name . '_thumb' . $ext;

                                            echo "<img id='Photo$i' src='".base_url("images/portfolio/$thumb")."' alt='' class='img-responsive'> <br>";
                                        }
                                                    */
                                        ?>
                                    </div>
                                </div>
                            <?php endfor;?>

                            <div class="form-group text-left">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="update_construction_photos" class="btn btn-danger">Mettre a jour</button>
                                </div>
                            </div>

                            <?= form_close()?>

                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <?php
                    for ($i = 0; $i < 10 ; $i++):

                        $photo = $construction["Photo$i"];

                        if ($photo != ""){
                            $upload_data = json_decode($photo);
                            //$this->dump($upload_data);
                            //$file_name = $upload_data['file_name'];
                            $ext = $upload_data->file_ext;
                            $thumb = $upload_data->raw_name . '_thumb' . $ext;

                            echo "<img src='".base_url("images/portfolio/$thumb")."' alt=''> <br>";
                        }
                    endfor;
                    ?>

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
        $('input[type="file"]').change(function (event) {
            console.log('e',event)
        })
    });

</script>