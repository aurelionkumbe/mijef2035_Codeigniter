                                                                                                                                                                                                                                                                                                                                <!DOCTYPE html>
<html lang="en">
    <?php include_once ('partials/head.php') ?>


<body>
    
    <?php include_once ('partials/header.php') ?>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Service de Locations</h1>
                    <p>Maisons, Studios, Appartements, Bureaux à louer.</p>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-5">
                            
                        </div>
                        <div class="col-sm-6" >
                            <img src="<?=base_url('images/contact.gif' )?>" alt="" style=" height: 6em;">                            
                            <span style="vertical-align: middle; display: inline-block">
                                (237) 663 975 836 &nbsp; <i class="fa fa-mobile-phone"></i> <br>
                                (237) 691 500 645 &nbsp; <i class="fa fa-mobile-phone"></i> <br>
                                (237) 672 982 484 &nbsp; <i class="fa fa-whatsapp"></i>
                            </span>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section id="locations">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Que voulez-vous louer ?</div>
                        <div class="panel-body w3-padding-0 ">
                            <div class="list-group" ">
                                <a href="<?= base_url("location/?choix=appart") ?>" class="list-group-item <?= is_null($choix) || $choix=="appart"? 'active' : '' ?>" style="border-radius: 0">Appartements & Maisons</a>
                                <!--a href="<?= base_url("location/?choix=maison") ?>" class="list-group-item <?= $choix=="maison"? 'active' : '' ?>" style="border-radius: 0">Maisons</a-->
                                <a href="<?= base_url("location/?choix=studio") ?>" class="list-group-item <?= $choix=="studio"? 'active' : '' ?>" style="border-radius: 0">Studios</a>
                                <a href="<?= base_url("location/?choix=bureau") ?>" class="list-group-item <?= $choix=="bureau"? 'active' : '' ?>" style="border-radius: 0">Bureaux</a>
                            <a href="<?= base_url("location/?choix=magasin") ?>" class="list-group-item <?= $choix=="magasin"? 'active' : '' ?>" style="border-radius: 0">Magasins</a>
                            <a href="<?= base_url("location/?choix=immeuble") ?>" class="list-group-item <?= $choix=="immeuble"? 'active' : '' ?>" style="border-radius: 0">Immeubles</a>
                            <a href="<?= base_url("location/?choix=autre") ?>" class="list-group-item <?= $choix=="autre"? 'active' : '' ?>" style="border-radius: 0">Autres</a>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Contact</div>
                        <div class="panel-body">
                            <?php include ('partials/address.php') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-7">
                    <?php
                    try{
                         include_once 'partials/'.$choix.'.php' ;
                    } catch(Exception $ex){
                        echo 'la page relative a vore choix est introuvable';
                    }
                    ?>
                </div>
            </div>
            <hr>
        </div>
    </section><!--/#services-->

        <?php include_once "partials/services.php" ?>


<?php include_once ('partials/footer.php') ?>

<?php include_once ('partials/scripts.php') ?>

</body>
</html>