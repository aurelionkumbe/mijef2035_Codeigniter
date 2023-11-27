
<?php 
    $page = "Utilisateurs incomplets";
    $eng = "Incoplete users";
    require_once("aut/bdconnect.php");
    require_once("aut/session.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    include('menu.php');
                ?>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Liste <?php echo $page; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $eng; ?> list
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Autres
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="liste_manquant.php">Nom et prénom</a>
                                        </li>
                                        <li>
                                            <a href="liste_manquant.php?sort=1">Pseudo</a>
                                        </li>
                                        <li>
                                            <a href="liste_manquant.php?sort=2">Numéros telephone</a>
                                        </li>
                                        <li>
                                            <a href="liste_manquant.php?sort=3">Kwata</a>
                                        </li>
                                        <li>
                                            <a href="liste_manquant.php?sort=4">Métier</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper"  id="tableau">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <h4> Par
                                        <?php 
                                            if(isset($_GET['sort']))
                                                {
                                                    if($_GET['sort']==2)
                                                        {
                                                            echo 'numéros de téléphone';
                                                        }
                                                    elseif($_GET['sort']==3)
                                                        {
                                                            echo 'Kwatas';
                                                        }
                                                    elseif($_GET['sort']==4)
                                                        {
                                                            echo 'métier';
                                                        }
                                                    elseif($_GET['sort']==1)
                                                        {
                                                            echo 'pseudos';
                                                        }
                                                }
                                            else
                                                {
                                                    echo 'noms et Prénom';
                                                }
                                        ?>
                                    manquants</h4>
                                    <thead>
                                        <tr>
                                            <th> N°</th>
                                            <th> Nom</th>
                                            <th> Prénom</th>
                                            <th> Pseudo</th>
                                            <th> Téléphone</th>                               
                                            <th> Kwata</th>                               
                                            <th> Statut</th>
                                            <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            if(isset($_GET['sort']))
                                                {
                                                    if($_GET['sort'] == 2)
                                                        {
                                                            $reponse = $bdd ->query('SELECT * FROM kh_user WHERE telephone = 0 OR telephone = "" ORDER BY nom_user ASC');
                                                        }
                                                    elseif($_GET['sort'] == 3)
                                                        {
                                                            $reponse = $bdd ->query('SELECT * FROM kh_user WHERE kh_kwata_id IS NULL ORDER BY nom_user ASC');
                                                        }
                                                    elseif($_GET['sort'] == 4)
                                                        {
                                                            $reponse = $bdd ->query('SELECT * FROM kh_user WHERE kh_metier_id IS NULL OR kh_metier_id = 0 ORDER BY nom_user ASC');
                                                        }
                                                    elseif($_GET['sort'] == 1)
                                                        {
                                                            $reponse = $bdd ->query('SELECT * FROM kh_user WHERE pseudo = "" ORDER BY nom_user ASC');
                                                        }
                                                }
                                            else
                                                {           
                                                    $reponse = $bdd ->query('SELECT * FROM kh_user WHERE nom_user = "" AND prenom = "" ORDER BY nom_user ASC');   
                                                }
                                            
                                            while ($donnees = $reponse ->fetch())
                                               {
                                                    $id = $donnees['id_user'];
                                                    $nom = $donnees['nom_user'];
                                                    $pnom = $donnees['prenom'];
                                                    $pseudo = $donnees['pseudo'];
                                                    $tel = $donnees['telephone'];
                                                    $kwat = $donnees['kh_kwata_id'];
                                                    $stat = $donnees['statut'];
                                                    
                                                    if($stat != 0){ $statu = 'fa fa-check-circle-o'; $btn = 'fa fa-times  fa-fw'; $clr = 'btn-warning';}
                                                    else{ $statu = 'fa fa-times-circle-o'; $btn = 'fa fa-check  fa-fw'; $clr = 'btn-success';}
                                                    
                                                    $rpons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
                                                    $rpons ->execute(array($kwat));
                                                    while ($done = $rpons ->fetch())
                                                       {                  
                                                            $kwata = $done['nom_kwata'];
                                                        }
                                                    $rpons->closeCursor();
                                                    
                                                    echo '<tr>';
                                                    echo '<td>'.$i.'</td>';
                                                    echo '<td>'.$nom.'</td>';
                                                    echo '<td>'.$pnom.'</td>';
                                                    echo '<td>'.$pseudo.'</td>';
                                                    echo '<td>'.$tel.'</td>';
                                                    echo '<td>'.$kwata.'</td>';
                                                    echo '<td><i class="fa '.$statu.'"></i></td>';
                                                    echo '<td class="action"><div class="btn-group">
                                                            <button class="btn btn-primary" onclick="affich(1,'.$id.');" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                            <button id="pub" class="btn '.$clr.'" onclick="affich(2,'.$id.');"><i class="fa '.$btn.'"></i></button>
                                                            <button id="sup" class="btn btn-danger" onclick="affich(3,'.$id.');"><i class="fa fa-trash"></i></button>
                                                    </div></td>';
                                                    echo '</tr>';
                                                
                                                    $i++ ;
                                                }
                                            $reponse->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog affmodal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"> <?php echo $page; ?> </h4>
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
        function affich($op, $id){
            var purl="";
            var mod="";
            if($op==1)
                purl="user.php";
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
                    var type = "user";
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
                        $("#tableau").load("affuser.php");
                    
                });
            }   
    </script>

</body>

</html>