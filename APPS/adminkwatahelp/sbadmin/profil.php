<?php 
	$page = "Profil admin";
	$eng = "Admin profil";	
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

    <link rel="shortcut icon" href="../img/log.png">

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
                    <h1 class="page-header">  <?php echo $page; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="panel panel-default">
                    <div class="panel-heading">
                        Profil
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Mes Infos</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">Editer mon profil</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <?php
                                    $ponse = $bdd ->prepare('SELECT * FROM kh_admin WHERE id_admin = ?');
                                    $ponse ->execute(array($_SESSION['idadmin']));
                                    while ($dons = $ponse ->fetch())
                                       {
                                            $id = $dons['id_admin'];
                                            $nom = $dons['nom_admin'];
                                            $login = $dons['login_admin'];
                                            $pass = $dons['pass_admin'];
                                            $da = $dons['acces_admin'];
                                            $stat = $dons['valid_admin'];
                                            
                                                if($stat != 0){ $statut = 'Valide';}
                                                else{ $statut = 'Invalide';}
                                            
                                                if($da == 0){ $dac = 'Aucun'; }
                                                elseif($da == 1){ $dac = 'Tout'; }
                                                elseif($da == 2){ $dac = 'Publication'; }
                                                elseif($da == 3){ $dac = 'Edition'; }
                                                
                                                echo '<div class="bio-row">
                                                      <p><span>Nom complet </span>: '.$nom.' </p>
                                                  </div>';
                                                echo '<div class="bio-row">
                                                      <p><span>Login </span>: '.$login.' </p>
                                                  </div>';
                                                echo '<div class="bio-row">
                                                      <p><span>Droit d\'accès </span>: '.$dac.' </p>
                                                  </div>';
                                        }
                                    $ponse->closeCursor();
        
                                ?>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div id="resultat"></div>
                                <form class="form-horizontal" role="form" id="profil_form" method="post" action="modification.php">                                                  
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">Nom complet:</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="nm" name="nom" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">login : </label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="login" name="login" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">Mot de passe : </label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="pass" name="pass" type="text" />
                                          </div>
                                      </div>
                                      
                                        <input type="hidden" name="modif" value="admin"/>
                                        <input type="hidden" name="id_obj" value="<?php echo $_SESSION['idadmin'];?>"/>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" class="btn btn-primary">Modifier</button>
                                              <button type="reset" class="btn btn-danger">Annuler</button>
                                          </div>
                                      </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
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
        $("#profil_form").submit(function(e)
            { 
                var formObj = $(this);
                var formURL = formObj.attr("action");
                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
                    type: 'POST',
                    data:  formData,
                    mimeType:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        if(data!='')
                            {
                                
                                $("#resultat").html('<div class="alert alert-success" style="display: block"><a class="close" data-dismiss="alert">×</a>'+data+'</div>');
                                $("#profil_form").get(0).reset();
                            }
                    }
            });             
           e.preventDefault();
            });$("#profil_form").submit(); //EOF
    </script>

</body>

</html>
