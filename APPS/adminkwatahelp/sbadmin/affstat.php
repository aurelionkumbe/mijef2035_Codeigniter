<?php 
	$page = "Statistiques ";
	$eng = "Statistics";	
	$tp = "l"; 
	require_once("aut/bdconnect.php");
	require_once("aut/session.php");
	//require_once("../tete.php");
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
                <div class="col-lg-12">
                   <div id="stat" class="panel panel-default">
                            <?php
                                require_once("aut/bdconnect.php");

                                if($_GET['type']=="stat")
                                    {
                                        $nom ="Région";
                                        
                                        $reponse = $bdd ->query('SELECT * FROM kh_reg');
                                        
                                                                                                                                                
                            ?>

                             <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $nom; ?>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Details <?php echo $nom; ?>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                             <?php
                                                while ($donnees = $reponse ->fetch())
                                                    {
                                                        $id = $donnees['id_reg'];
                                                        $noma = $donnees['nom_reg'];
                                                        echo '<li>
                                                            <a href="affstat.php?idart='.$id.',&type=reg">'. $noma.'</a>
                                                        </li>';
                                                    }
                                                                                                 
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th><?php echo $nom; ?></th>
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
                                                                $id = $donnees['id_reg'];
                                                                $noml = $donnees['nom_reg'];

                                                                    $rpnse = $bdd ->query("SELECT * FROM kh_user us JOIN kh_kwata JOIN kh_city JOIN kh_reg WHERE id_kwata = kh_kwata_id AND id_city = kh_city_id AND id_reg = kh_reg_id AND kh_metier_id IS NULL AND id_reg = $id");
                                                                    $nbrecl = $rpnse->rowCount();

                                                                    $rponse = $bdd ->query("SELECT * FROM kh_user us JOIN kh_kwata JOIN kh_city JOIN kh_reg WHERE id_kwata = kh_kwata_id AND id_city = kh_city_id AND id_reg = kh_reg_id AND kh_metier_id IS NOT NULL AND id_reg = $id");
                                                                    $nbrepr= $rponse->rowCount();

                                                                    $ttl = $nbrepr + $nbrecl;

                                                                    echo "<tr>
                                                                        <td> $i </td>
                                                                        <td> $noml </td>
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
                            <?php 
                                } 

                                if($_GET['type']=="reg")
                                    {
                                        $idget = $_GET['idart'];
                                        $nom ="Ville";
                                        
                                        $reponse = $bdd ->prepare('SELECT * FROM kh_city WHERE kh_reg_id = ? ORDER BY nom_city ASC');
                                        $reponse ->execute(array($idget));
                            ?>

                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $nom; ?>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs">
                                            <i class="fa  fa-chevron-left fa-fw"></i>
                                            <?php echo '<a href="affstat.php?type=stat">Retour</a>'; ?>
                                        </button>
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Details <?php echo $nom; ?>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                             <?php
                                                while ($donnees = $reponse ->fetch())
                                                    {
                                                        $id = $donnees['id_city'];
                                                        $noma = $donnees['nom_city'];
                                                        echo '<li>
                                                            <a href="affstat.php?idart='.$id.'&type=city">'. $noma .'</a>
                                                        </li>';
                                                    }
                                                                                                 
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th><?php echo $nom; ?></th>
                                                        <th>Clients</th>
                                                        <th>Prestataires</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i = 1;
                                                        $reponse = $bdd ->prepare('SELECT * FROM kh_city WHERE kh_reg_id = ?');
                                                        $reponse ->execute(array($idget));
                                                        while ($donees = $reponse ->fetch())
                                                           {                  
                                                                $id = $donees['id_city'];
                                                                $noml = $donees['nom_city'];

                                                                    $rpnse = $bdd ->prepare('SELECT * FROM kh_user us JOIN kh_kwata JOIN kh_city WHERE id_kwata = kh_kwata_id AND id_city = kh_city_id AND kh_metier_id IS NULL AND id_city= ? AND kh_reg_id = ?');
                                                                    $rpnse ->execute(array($id,$idget));
                                                                    $nbrecl = $rpnse->rowCount();

                                                                    $rponse = $bdd ->prepare('SELECT * FROM kh_user us JOIN kh_kwata JOIN kh_city WHERE id_kwata = kh_kwata_id AND id_city = kh_city_id AND kh_metier_id IS NOT NULL AND id_city = ? AND kh_reg_id = ?');
                                                                    $rponse ->execute(array($id,$idget));
                                                                    $nbrepr= $rponse->rowCount();

                                                                    $ttl = $nbrepr + $nbrecl;

                                                                    echo "<tr>
                                                                        <td> $i </td>
                                                                        <td> $noml </td>
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
                            <?php 
                                } 

                                if($_GET['type']=="city")
                                    {
                                        $idget = $_GET['idart'];
                                        $nom ="kwata";
                                        
                                        $reponse = $bdd ->prepare('SELECT * FROM kh_kwata WHERE kh_city_id = ? ORDER BY nom_kwata ASC');
                                        $reponse ->execute(array($idget));
                            ?>

                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $nom; ?>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs">
                                            <i class="fa  fa-chevron-left fa-fw"></i>
                                            <?php echo '<a href="affstat.php?idart='.$idget .'&type=reg">Retour</a>'; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th><?php echo $nom; ?></th>
                                                        <th>Clients</th>
                                                        <th>Prestataires</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i = 1;
                                                        $reponse = $bdd ->prepare('SELECT * FROM kh_kwata WHERE kh_city_id = ?');
                                                        $reponse ->execute(array($idget));
                                                        while ($donees = $reponse ->fetch())
                                                           {                  
                                                                $id = $donees['id_kwata'];
                                                                $noml = $donees['nom_kwata'];

                                                                    $rpnse = $bdd ->prepare('SELECT * FROM kh_user us JOIN kh_kwata WHERE id_kwata = kh_kwata_id AND kh_metier_id IS NULL AND id_kwata = ? AND kh_city_id = ?');
                                                                    $rpnse ->execute(array($id,$idget));
                                                                    $nbrecl = $rpnse->rowCount();

                                                                    $rponse = $bdd ->prepare('SELECT * FROM kh_user us JOIN kh_kwata WHERE id_kwata = kh_kwata_id AND kh_metier_id IS NOT NULL AND id_kwata = ? AND kh_city_id = ?');
                                                                    $rponse ->execute(array($id,$idget));
                                                                    $nbrepr= $rponse->rowCount();

                                                                    $ttl = $nbrepr + $nbrecl;

                                                                    echo "<tr>
                                                                        <td> $i </td>
                                                                        <td> $noml </td>
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
                            <?php 
                                } 
                            ?>
                    </div>
                    <!-- /.panel -->
                </div>
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

</body>

</html>
