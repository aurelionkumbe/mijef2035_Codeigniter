<?php 
	$page = "Tableau de bord ";
	$eng = "Dashboard";	
	$tp = "l"; 
	require_once("aut/bdconnect.php");
	require_once("aut/session.php");    
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php //echo $description; ?>" />
	<meta name="author" content="<?php //echo $author; ?>" />

    <link rel="shortcut icon" href="img/log.png">

    <title>Admin-Kwata &middot; <?php echo $page; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <?php
                    include('en_tete.php');
                ?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php
                    include('profil_connect.php');
                ?>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <?php
                    if($_SESSION['pass'] != 4){include('menu.php');}
                ?>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">  <?php echo $page; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-7">
                   <div id="stat" class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Statistiques utilisateurs
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs">
                                       <a href="affstat.php?type=stat"> Details </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Région</th>
                                                    <th>Clients</th>
                                                    <th>Prestataires</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    $reponse = $bdd ->query('SELECT * FROM kh_reg');
                                                    while ($donnees = $reponse ->fetch())
                                                       {                  
                                                            $idreg = $donnees['id_reg'];
                                                            $nom = $donnees['nom_reg'];

                                                                $rpnse = $bdd ->query("SELECT * FROM kh_user us JOIN kh_kwata JOIN kh_city JOIN kh_reg WHERE id_kwata = kh_kwata_id AND id_city = kh_city_id AND id_reg = kh_reg_id AND kh_metier_id IS NULL AND id_reg = $idreg");
                                                                $nbrecl = $rpnse->rowCount();

                                                                $rponse = $bdd ->query("SELECT * FROM kh_user us JOIN kh_kwata JOIN kh_city JOIN kh_reg WHERE id_kwata = kh_kwata_id AND id_city = kh_city_id AND id_reg = kh_reg_id AND kh_metier_id IS NOT NULL AND id_reg = $idreg");
                                                                $nbrepr= $rponse->rowCount();

                                                                $ttl = $nbrepr + $nbrecl;

                                                            echo "<tr>
                                                                <td> $i </td>
                                                                <td> $nom </td>
                                                                <td> $nbrecl </td>
                                                                <td> $nbrepr </td>
                                                                <td> $ttl </td>
                                                            </tr>";

                                                            $i++;
                                                        }
                                                    $reponse->closeCursor();                                                 
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $eng; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                             <th> Module</th>
                                            <?php
                                                if ($_SESSION['pass']!=4) {
                                            ?>
			                                 <th> Publié / valide</th>
			                                 <th> Non publié / non valide</th>
                                            <?php
                                                }
                                            ?>
			                                 <th> Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
								if($_SESSION['pass'] == 1)
												{
								echo '<tr>
                                 <td>Admin</td>'; ?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_admin WHERE valid_admin != 0 AND id_admin != 1');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_admin.php?rue=1"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_admin WHERE valid_admin = 0 AND id_admin != 1');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_admin.php?rue=2"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_admin WHERE id_admin != 1');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_admin.php"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                              <?php echo '</tr>'; } ?>                              
                              <tr>
                                 <td>Utilisateurs</td>
                                <?php
                                    if ($_SESSION['pass']!=4) {
                                ?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_user WHERE statut != 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_user.php?rue=1"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_user WHERE statut = 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_user.php?rue=2"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                                <?php
                                    }
                                  ?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_user');
									$nbre = $rponse->rowCount();
									if($nbre !=0 && $_SESSION['pass']!=4){ echo '<td><a class="btn btn-info" href="liste_user.php"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                              </tr>
                              <tr>
                                 <td>Kwata</td>
                                <?php
                                    if ($_SESSION['pass']!=4) {
                                ?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_kwata WHERE statut != 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_kwat.php?rue=1"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_kwata WHERE statut = 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_kwat.php?rue=2"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                                <?php
                                    }
                                  ?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_kwata');
									$nbre = $rponse->rowCount();
									if($nbre !=0 && $_SESSION['pass']!=4){ echo '<td><a class="btn btn-info" href="liste_kwat.php"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                              </tr>
                               <tr>
                                 <td>Metier</td>
                                <?php
                                    if ($_SESSION['pass']!=4) {
                                ?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_metier WHERE statut != 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_job.php?rue=1"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_metier WHERE statut = 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_job.php?rue=2"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                                <?php
                                    }
                                ?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_metier');
									$nbre = $rponse->rowCount();
									if($nbre !=0 && $_SESSION['pass']!=4){ echo '<td><a class="btn btn-info" href="liste_job.php"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                              </tr>
                              <?php
                                if($_SESSION['pass']!=4)
                                    {
                              ?>
                              <tr>
                                 <td>Vedette</td>
                                <?php
									$rponse = $bdd ->query('SELECT * FROM kh_vedette WHERE statut != 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_vedette.php?rue=1"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_vedette WHERE statut = 0');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_vedette.php?rue=2"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
								<?php
									$rponse = $bdd ->query('SELECT * FROM kh_vedette');
									$nbre = $rponse->rowCount();
									if($nbre !=0){ echo '<td><a class="btn btn-info" href="liste_vedette.php"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
									else{ echo '<td><a class="btn btn btn-default disabled"><span class="icon_edit_alt"></span> '.$nbre.'</a></td>';}
								?>
                              </tr>
                              <?php
                                }
                              ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"> Liste</h4>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script>
        function affich($op, $id){
            var purl="";
            var mod="";
            if($op==1)
                purl="admin.php";
            if($op==2)
                {
                    purl="traitement.php";
                    mod="pub";
                }
            if($op==3)
                {
                    purl="traitement.php";
                    mod="sup";
                }
            $(document).ready(function(){
                    var idart = $id;
                    var type = "admin";
                    var dataString = 'idart='+ idart+'&type='+type+'&mod='+mod;
                    
                    $(".modal-body").fadeIn(1000).html('<div style="text-align:center; margin-right:auto; margin-left:auto">Patientez...</div>');
                    $.ajax({
                        type: "POST",
                        data: dataString,
                        url: purl,
                        error:function(msg){
                            $(".modal-body").addClass("tableau_msg_erreur").fadeOut(800).fadeIn(800).fadeOut(400).fadeIn(400).html('<div style="margin-right:auto; margin-left:auto; text-align:center">Impossible de charger cette page</div>');
                        },
                        success:function(data){
                            $(".modal-body").fadeIn(1000).html(data);
                        }
                    });
                    if($op==1)
                        $('#myModal2').modal('show');
                    else
                        $("#tableau").load("affadmin.php");
                    
                });
            }   
    </script>

</body>

</html>
