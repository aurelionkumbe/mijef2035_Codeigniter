<?php
if(isset($datas)):

    if (empty($datas)):
        echo '<h2 class="text-center text-muted">Aucun résultat pour le moment <br> <br><small> essayer un autre ménu</small></h2>';
    else:
        foreach($datas as $el ):
            $id = $el['ID'];
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="media w3-padding">
                            <div class="pull-left">
                                <img class="img-responsive img-appart " src="<?=base_url('images/appart.png')?>" alt="appart">
                            </div>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="media-heading"><span class="fa fa-location-arrow"></span> <?=$el['Quartier']?> - <?=$el['Type']?> </h3>
                                        <p class="text-justify" style="word-break: break-all;"><?=$el['Description']?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="w3-margin-bottom pull-right">
                                            <?php if($page == 'locations'): ?>
                                                <span class="prix badge"><?=$el['Prix_location']?> FCFA</span>
                                            <?php elseif($page == 'achats'): ?>
                                                <span class="prix badge"><?=$el['Prix_vente']?> FCFA</span>
                                            <?php endif ?>
                                        </div>

                                        <div class="pull-right btn-group" >
                                            <?php if($page == 'locations'): ?>
                                                <a title="details et photos"  data-toggle="tooltip"   href="<?= base_url("location/detail?choix=$choix&id=$id")?>" class="btn btn-default btn-block"> <i class="fa fa-arrow-right"></i> Details</a>
                                                <a  onclick="alert('cette option n\'est pas encore disponible')"  title="pas encore disponible"  data-toggle="tooltip"   href="<?= base_url("location/louer?choix=$choix&id=$id")?>" class="btn disabled btn-primary btn-block" style="opacity: .3;"> <i class="fa fa-hand-o-up"></i> Louer</a>
                                            <?php elseif($page == 'achats'): ?>
                                                <a title="details et photos"  data-toggle="tooltip"   href="<?= base_url("achat/detail?choix=$choix&id=$id")?>" class="btn btn-default btn-block"> <i class="fa fa-arrow-right"></i> Details</a>
                                                <a  onclick="alert('cette option n\'est pas encore disponible')"  title="pas encore disponible"  data-toggle="tooltip"   href="<?= base_url("location/louer?choix=$choix&id=$id")?>" class="btn disabled btn-primary btn-block"  style="opacity: .3;"> <i class="fa fa-hand-o-up"></i> Acheter</a>
                                            <?php endif ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div><!--/.col-md-12-->
            </div><!--/.row-->

            <?php
        endforeach;
    endif;
elseif(isset($data)):
    $id = $data['ID'];
    include_once 'details.php';
endif;
?>