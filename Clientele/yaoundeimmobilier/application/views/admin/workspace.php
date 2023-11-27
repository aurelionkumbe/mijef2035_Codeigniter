
<div class="wrapper">
    <?php include_once "aside.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="enregistrements-wrapper">
        <section class="content-header">
            <h1>
                Dashboard

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Enregistrements</li>
            </ol>
        </section>
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total immobiliés a vendres</span>
                            <span class="info-box-number"><?= count($constructionsAVendre)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total immobiliés a loués</span>
                            <span class="info-box-number"><?= count($constructionsALouer)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total terrain a vendre</span>
                            <span class="info-box-number"><?= count($terrains)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-google-pl"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total proprietaire</span>
                            <span class="info-box-number"><?= count($proprietaires)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div hidden class="clearfix visible-sm-block"></div>

            </div>
            <!-- /.row -->



            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-11">
                    <?php isset($_SESSION['msg']) ? $_SESSION['msg'] : ''?>

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Derniers enregistrements</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">


                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#constuctions" data-toggle="tab" aria-expanded="true">Immobiliés</a></li>
                                    <li class=""><a href="#proprietaires" data-toggle="tab" aria-expanded="false">Proprietaires</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="constuctions">

                                        <div class="table-responsive">
                                            <table class="table no-margin" data-toggle="datatable" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th hidden>ID</th>
                                                    <th>Quartier</th>
                                                    <th>Etat</th>
                                                    <th>Offre</th>
                                                    <th>Visibilité</th>
                                                    <th>Proprietaire</th>
                                                    <th>Type</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($constructions as $cons): ?>
                                                    <tr class="construction" id="construction-<?=$cons->ID?>" data-id="<?=$cons->ID?>">
                                                        <td hidden><a href="pages/examples/invoice.html"><?=$cons->ID?></a></td>
                                                        <td><?=$cons->Quartier?></td>
                                                        <td><?=$cons->Etat?></td>
                                                        <td>
                                                            <?php if($cons->A_louer ): ?>
                                                                <span class="label label-primary">A louer</span>
                                                            <?php endif; if ($cons->A_vendre): ?>
                                                                <span class="label label-info">A Vendre</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($cons->Est_visible ): ?>
                                                                <span class="label label-success">Public</span>
                                                            <?php endif; if ($cons->A_vendre): ?>
                                                                <span class="label label-warning">Privée</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?= $cons->Proprietaire?>
                                                        </td>
                                                        <td><?=$cons->Libelle?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="console/constructions/<?=$cons->ID?>/update" class="btn btn-primary">
                                                                    <i class="fa fa-edit"></i></a>
                                                                <a href="console/constructions/<?=$cons->ID?>/delete" class="btn btn-danger delete">
                                                                    <i class="fa fa-remove"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="proprietaires">

                                        <div class="table-responsive">
                                            <table class="table no-margin" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th hidden>ID</th>
                                                    <th>Noms</th>
                                                    <th>Quartier</th>
                                                    <th>Email</th>
                                                    <th>Tel1</th>
                                                    <th>Tel2</th>
                                                    <th>Tel3</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($proprietaires as $cons): ?>
                                                <tr class="proprietaire" id="proprietaire-<?=$cons->ID?>" data-id="<?=$cons->ID?>">
                                                    <td hidden><a href="pages/examples/invoice.html"><?=$cons->ID?></a></td>
                                                    <td><?=$cons->Nom . ' ' .$cons->Prenom?></td>
                                                    <td><?=$cons->Quartier?></td>
                                                    <td><?=$cons->Email?></td>
                                                    <td><?= $cons->Tel1?></td>
                                                    <td><?= $cons->Tel2?></td>
                                                    <td><?= $cons->Tel3?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="console/proprietaires/<?=$cons->ID?>/update" class="btn btn-primary">
                                                                <i class="fa fa-edit"></i></a>
                                                            <a href="console/proprietaires/<?=$cons->ID?>/delete" class="btn btn-danger delete">
                                                                <i class="fa fa-remove"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.tab-pane -->


                                </div>
                                <!-- /.tab-content -->
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <!--a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nouveau enregistrement</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Voir plus d'enregistrement</a-->
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

    });
</script>