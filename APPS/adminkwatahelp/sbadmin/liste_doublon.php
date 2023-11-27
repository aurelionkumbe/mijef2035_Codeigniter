
<?php 
    $page = "Utilisateurs en doublons";
    $eng = "Duplicates users";
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
                                <?php
                                    if(isset($_GET['sort']))
                                        if($_GET['sort']==2)
                                            {
                                                echo '<a id="nouveau" class="btn btn-warning" href="doublon_destr.php" title="Delete redondances"><i class="fa fa-edit fa-fw"></i> Supprimer les doublons</a>';
                                            }
                                ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Autres
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="liste_doublon.php">Toute les infos</a>
                                        </li>
                                        <li>
                                            <a href="liste_doublon.php?sort=2">Même telephone</a>
                                        </li>
                                        <li>
                                            <a href="liste_doublon.php?sort=3">Même nom & pseudo</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper"  id="tableau">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <h4> Sur 
                                        <?php 
                                            if(isset($_GET['sort']))
                                                {
                                                    if($_GET['sort']==2)
                                                        {
                                                            echo 'les numéros de téléphone';
                                                        }
                                                    elseif($_GET['sort']==3)
                                                        {
                                                            echo 'les noms et pseudos';
                                                        }
                                                }
                                            else
                                                {
                                                    echo 'les noms, pseudos et numéros de téléphone';
                                                }
                                        ?>
                                    </h4>
                                    
                                    <thead>
                                        <tr>
                                            <th> N°</th>
                                            <th> Nom</th>
                                            <th> Prénom</th>
                                            <th> Pseudo</th>
                                            <th> Téléphone</th>                               
                                            <th> Kwata</th>                               
                                            <th> Secto</th>
                                            <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $o = 1;
                                            $tabuser = array();
                   
                                            $reponse = $bdd ->query('SELECT * FROM kh_user');
                                            
                                            while ($donnees = $reponse ->fetch())
                                               {
                                                    $tabuser[] = 
                                                            array(
                                                                'id' => $donnees["id_user"],
                                                                'nom' => $donnees["nom_user"],
                                                                'pnom' => $donnees["prenom"],
                                                                'pseudo' => $donnees["pseudo"],
                                                                'tel' => $donnees["telephone"],
                                                                'kwat' => $donnees["kh_kwata_id"],
                                                                'secto' => $donnees["secto"]

                                                            );
                                                }
                                            $reponse->closeCursor();
                                            $nbre = count($tabuser);

                                            if(isset($_GET['sort']))
                                                {
                                                    if($_GET['sort']==3)
                                                        {
                                                            for($i = 0; $i < $nbre-1; $i++)
                                                                {
                                                                    for($j = $i+1; $j < $nbre; $j++)
                                                                        {
                                                                            if(($tabuser[$i]['nom']==$tabuser[$j]['nom'])&&($tabuser[$i]['pnom']==$tabuser[$j]['pnom'])&&($tabuser[$i]['pseudo']==$tabuser[$j]['pseudo']))
                                                                                {
                                                                                    $rpons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
                                                                                    $rpons ->execute(array($tabuser[$i]['kwat']));
                                                                                    while ($done = $rpons ->fetch())
                                                                                       {                  
                                                                                            $kwata = $done['nom_kwata'];
                                                                                        }
                                                                                    $rpons->closeCursor();
                                                                                    echo '<tr>';
                                                                                    echo '<td>'.$o.'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['nom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['pnom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['pseudo'].'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['tel'].'</td>';
                                                                                    echo '<td>'.$kwata.'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['secto'].'</td>';                                  
                                                                                    echo '<td class="action"><div class="btn-group">
                                                                                            <button class="btn btn-primary" onclick="affich(1,'.$tabuser[$i]['id'].');" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                                                            <button id="sup" class="btn btn-danger" onclick="affich(3,'.$tabuser[$i]['id'].');"><i class="fa fa-trash"></i></button>
                                                                                    </div></td>';
                                                                                    echo '</tr>';

                                                                                    $repons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
                                                                                    $repons ->execute(array($tabuser[$j]['kwat']));
                                                                                    while ($don = $repons ->fetch())
                                                                                       {                  
                                                                                            $kwat = $don['nom_kwata'];
                                                                                        }
                                                                                    $rpons->closeCursor();
                                                                                    echo '<tr>';
                                                                                    echo '<td>'.$o.'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['nom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['pnom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['pseudo'].'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['tel'].'</td>';
                                                                                    echo '<td>'.$kwat.'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['secto'].'</td>';                                  
                                                                                    echo '<td class="action"><div class="btn-group">
                                                                                            <button class="btn btn-primary" onclick="affich(1,'.$tabuser[$j]['id'].');" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                                                            <button id="sup" class="btn btn-danger" onclick="affich(3,'.$tabuser[$j]['id'].');"><i class="fa fa-trash"></i></button>
                                                                                    </div></td>';
                                                                                    echo '</tr>';
                                                                                
                                                                                    $o++ ;
                                                                                }
                                                                        }
                                                                }
                                                        }

                                                    elseif($_GET['sort']==2)
                                                        {
                                                            for($i = 0; $i < $nbre-1; $i++)
                                                                {
                                                                    for($j = $i+1; $j < $nbre; $j++)
                                                                        {
                                                                            if($tabuser[$i]['tel']==$tabuser[$j]['tel'] && ($tabuser[$i]['tel'] != 0))
                                                                                {
                                                                                    $rpons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
                                                                                    $rpons ->execute(array($tabuser[$i]['kwat']));
                                                                                    while ($done = $rpons ->fetch())
                                                                                       {                  
                                                                                            $kwata = $done['nom_kwata'];
                                                                                        }
                                                                                    $rpons->closeCursor();
                                                                                    echo '<tr>';
                                                                                    echo '<td>'.$o.'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['nom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['pnom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['pseudo'].'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['tel'].'</td>';
                                                                                    echo '<td>'.$kwata.'</td>';
                                                                                    echo '<td>'.$tabuser[$i]['secto'].'</td>';                                  
                                                                                    echo '<td class="action"><div class="btn-group">
                                                                                            <button class="btn btn-primary" onclick="affich(1,'.$tabuser[$i]['id'].');" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                                                            <button id="sup" class="btn btn-danger" onclick="affich(3,'.$tabuser[$i]['id'].');"><i class="fa fa-trash"></i></button>
                                                                                    </div></td>';
                                                                                    echo '</tr>';

                                                                                    $repons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
                                                                                    $repons ->execute(array($tabuser[$j]['kwat']));
                                                                                    while ($don = $repons ->fetch())
                                                                                       {                  
                                                                                            $kwat = $don['nom_kwata'];
                                                                                        }
                                                                                    $rpons->closeCursor();
                                                                                    echo '<tr>';
                                                                                    echo '<td>'.$o.'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['nom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['pnom'].'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['pseudo'].'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['tel'].'</td>';
                                                                                    echo '<td>'.$kwat.'</td>';
                                                                                    echo '<td>'.$tabuser[$j]['secto'].'</td>';                                  
                                                                                    echo '<td class="action"><div class="btn-group">
                                                                                            <button class="btn btn-primary" onclick="affich(1,'.$tabuser[$j]['id'].');" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                                                            <button id="sup" class="btn btn-danger" onclick="affich(3,'.$tabuser[$j]['id'].');"><i class="fa fa-trash"></i></button>
                                                                                    </div></td>';
                                                                                    echo '</tr>';
                                                                                
                                                                                    $o++ ;
                                                                                }
                                                                        }
                                                                }
                                                        }
                                                }
                                            else
                                                {
                                                    for($i = 0; $i < $nbre-1; $i++)
                                                        {
                                                            for($j = $i+1; $j < $nbre; $j++)
                                                                {
                                                                    if(($tabuser[$i]['nom']==$tabuser[$j]['nom'])&&($tabuser[$i]['pnom']==$tabuser[$j]['pnom'])&&($tabuser[$i]['pseudo']==$tabuser[$j]['pseudo'])&&($tabuser[$i]['tel']==$tabuser[$j]['tel']))
                                                                        {
                                                                            $rpons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
                                                                            $rpons ->execute(array($tabuser[$i]['kwat']));
                                                                            while ($done = $rpons ->fetch())
                                                                               {                  
                                                                                    $kwata = $done['nom_kwata'];
                                                                                }
                                                                            $rpons->closeCursor();
                                                                            echo '<tr>';
                                                                            echo '<td>'.$o.'</td>';
                                                                            echo '<td>'.$tabuser[$i]['nom'].'</td>';
                                                                            echo '<td>'.$tabuser[$i]['pnom'].'</td>';
                                                                            echo '<td>'.$tabuser[$i]['pseudo'].'</td>';
                                                                            echo '<td>'.$tabuser[$i]['tel'].'</td>';
                                                                            echo '<td>'.$kwata.'</td>';
                                                                            echo '<td>'.$tabuser[$i]['secto'].'</td>';                                  
                                                                            echo '<td class="action"><div class="btn-group">
                                                                                    <button class="btn btn-primary" onclick="affich(1,'.$tabuser[$i]['id'].');" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                                                    <button id="sup" class="btn btn-danger" onclick="affich(3,'.$tabuser[$i]['id'].');"><i class="fa fa-trash"></i></button>
                                                                            </div></td>';
                                                                            echo '</tr>';

                                                                            $repons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
                                                                            $repons ->execute(array($tabuser[$j]['kwat']));
                                                                            while ($don = $repons ->fetch())
                                                                               {                  
                                                                                    $kwat = $don['nom_kwata'];
                                                                                }
                                                                            $rpons->closeCursor();
                                                                            echo '<tr>';
                                                                            echo '<td>'.$o.'</td>';
                                                                            echo '<td>'.$tabuser[$j]['nom'].'</td>';
                                                                            echo '<td>'.$tabuser[$j]['pnom'].'</td>';
                                                                            echo '<td>'.$tabuser[$j]['pseudo'].'</td>';
                                                                            echo '<td>'.$tabuser[$j]['tel'].'</td>';
                                                                            echo '<td>'.$kwat.'</td>';
                                                                            echo '<td>'.$tabuser[$j]['secto'].'</td>';                                  
                                                                            echo '<td class="action"><div class="btn-group">
                                                                                    <button class="btn btn-primary" onclick="affich(1,'.$tabuser[$j]['id'].');" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                                                    <button id="sup" class="btn btn-danger" onclick="affich(3,'.$tabuser[$j]['id'].');"><i class="fa fa-trash"></i></button>
                                                                            </div></td>';
                                                                            echo '</tr>';
                                                                        
                                                                            $o++ ;
                                                                        }
                                                                }
                                                        }
                                                }
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