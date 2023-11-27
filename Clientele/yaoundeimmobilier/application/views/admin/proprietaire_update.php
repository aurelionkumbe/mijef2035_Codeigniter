<div class="wrapper">
    <?php include_once "aside.php"?>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper" id="" >
        <section class="content-header">
            <h1>
                Proprietaire
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Proprietaire</li>
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
                                <?= form_open_multipart('', 'class="form-horizontal"')?>

                                    <input type="hidden" name="ID" value="<?php echo $proprietaire->ID ?>">

                                    <div class="form-group">
                                        <label for="Nom" class="col-sm-2 control-label">Nom *</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom" value="<?= $proprietaire->Nom?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Prenom" class="col-sm-2 control-label">Prenom</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prenom" value="<?= $proprietaire->Prenom?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Photo" class="col-sm-2 control-label">Photo</label>
                                        <div class="col-sm-10">
                                            <input type="file"  class="form-control"  id="Photo" name="Photo" placeholder="Photo">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" value="<?= $proprietaire->Email?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Quartier" class="col-sm-2 control-label">Quartier</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Quartier" name="Quartier" placeholder="Quartier" value="<?= $proprietaire->Quartier?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Tel1" class="col-sm-2 control-label">Tel *</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Tel1" name="Tel1" placeholder="Tel1" value="<?= $proprietaire->Tel1?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Tel1" class="col-sm-2 control-label">Tel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Tel2" name="Tel2" placeholder="Tel2" value="<?= $proprietaire->Tel2?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Tel3" class="col-sm-2 control-label">Tel</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Tel3" name="Tel3" placeholder="Tel3" value="<?= $proprietaire->Tel3?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="update_proprietaire" class="btn btn-danger">Mettre a jour</button>
                                        </div>
                                    </div>
                                <?= form_close()?>
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix text-center">
                            <h4>Photo</h4>
                            <img src="<?= base_url($proprietaire->Photo)?>" alt="">
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">

                    <div class="col-md-12">

                    </div>

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

    });
</script>