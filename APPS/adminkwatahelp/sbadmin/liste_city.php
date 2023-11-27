
<?php
    $page = "Ville";
    $eng = "City";
    require_once("aut/bdconnect.php");
    require_once("aut/session.php");
    require_once("autocomplete.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel = "shortcut icon" href = "../img/log.png">

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
                            <a id="nouveau" class="btn btn-info" href="nvo_city.php" title="Add a new"><i class="fa fa-edit fa-fw"></i> Nouveau</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper" id="tableau">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th> N°</th>
                                             <th> Nom de la ville</th>                              
                                             <th> Région</th>                              
                                             <th> Statut</th>
                                             <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            $regn="";
                                            if(isset($_GET['rue']))
                                                {
                                                    if($_GET['rue'] == 1)
                                                        {
                                                            $reponse = $bdd ->query('SELECT * FROM kh_city WHERE statut != 0 ORDER BY nom_city ASC');
                                                        }
                                                    elseif($_GET['rue'] == 2)
                                                        {
                                                            $reponse = $bdd ->query('SELECT * FROM kh_city WHERE statut = 0 ORDER BY nom_city ASC');
                                                        }
                                                }
                                            else
                                                {           
                                                    $reponse = $bdd ->query('SELECT * FROM kh_city  ORDER BY nom_city ASC');   
                                                }
                                            
                                            while ($donnees = $reponse ->fetch())
                                               {
                                                    $id = $donnees['id_city'];
                                                    $nom = $donnees['nom_city'];
                                                    $reg = $donnees['kh_reg_id'];
                                                    $stat = $donnees['statut'];

                                                    $rponse = $bdd ->prepare('SELECT * FROM kh_reg  WHERE id_reg = ?');
                                                    $rponse ->execute(array($reg));
                                                    while ($donees = $rponse ->fetch())
                                                       {                  
                                                            $regn = $donees['nom_reg'];
                                                        }
                                                    $rponse->closeCursor();
                                                    
                                                    if($stat != 0){ $statu = 'fa fa-check-circle-o'; $btn = 'fa fa-times  fa-fw'; $clr = 'btn-warning';}
                                                    else{ $statu = 'fa fa-times-circle-o'; $btn = 'fa fa-check  fa-fw'; $clr = 'btn-success';}
                                                    
                                                        
                                                    echo '<tr>';
                                                    echo '<td>'.$i.'</td>';
                                                    echo '<td>'.$nom.'</td>';
                                                    echo '<td>'.$regn.'</td>';
                                                    echo '<td><i class="fa '.$statu.'"></i></td>';
                                                    echo '<td class="action"><div class="btn-group">
                                                            <button class="btn btn-primary" onclick="affich(1,'.$id.');" data-toggle="modal"><i class="fa fa-edit"></i></button>';
                                                            if($_SESSION['pass'] != 3){ echo '<button id="pub" class="btn '.$clr.'" onclick="affich(2,'.$id.');"><i class="fa '.$btn.'"></i></button>';}
                                                    echo '<button id="sup" class="btn btn-danger" onclick="affich(3,'.$id.');"><i class="fa fa-trash"></i></button>
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
    </script>
    <script>
        function affich($op, $id){
            var purl="";
            var mod="";
            if($op==1)
                purl="city.php";
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
                    var type = "city";
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
                        $("#tableau").load("affcity.php");
                    
                });
            }   
    </script>

</body>

</html>
