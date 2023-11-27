
<?php 
    $page="Photo";
    $eng="Picture";
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

    <link rel="shortcut icon" href="../img/log.png>">

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
                    <h1 class="page-header"> Nouveau  <?php echo $page; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             add <?php echo $eng; ?>
                            <a class="retour" href="liste_photo.php"><i class="fa fa-table"></i>Retour à la liste</a>
                        </div>
                        <!-- /.panel-heading -->
                            
                        <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="photo_form" method="post" action="enregistrement.php" enctype="multipart/form-data">
                                      <div class="form-group ">
                                          <label for="titre" class="control-label col-lg-2">Titre <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="titre" name="titre" type="text" required/>
                                          </div>
                                      </div>
                                      
                                        <div class="form-group ">
                                            <label for="photo" class="control-label col-lg-2">Photo </label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="photo" name="photo" type="file" multiple=true/>
                                            </div>
                                        </div>
                                      
                                        <div class="form-group ">
                                            <label for="text" class="control-label col-lg-2">Texte <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control " id="text" name="texte" required></textarea>
                                            </div>
                                        </div>
                                        
                                         <div class="form-group ">
                                            <label for="cat" class="control-label col-lg-2">Catégorie <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <select class=" form-control" id="cat" name="categorie" required>
                                                    <?php
                                                        $rponse = $bdd ->query('SELECT * FROM kh_cat_galerie WHERE statut != 0 ORDER BY nom_cat ASC');
                                                        while ($donees = $rponse ->fetch())
                                                           {                  
                                                                $id = $donees['id_catgalerie'];
                                                                $cat = $donees['nom_cat'];
                                                                
                                                                echo '<option value="'.$id.'">'.$cat.'</option>';
                                                                
                                                            }
                                                        $rponse->closeCursor();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <?php
                                            if($_SESSION['pass'] != 3)
                                                {
                                                    echo '<div class="form-group ">
                                                        <label for="stat" class="control-label col-lg-2">Publié </label>
                                                        <div class="col-lg-10">
                                                            <select class=" form-control" id="stat" name="statut">
                                                                <option value="0">NON</option>
                                                                <option value="1">OUI</option>
                                                            </select>
                                                        </div>
                                                    </div>';
                                                }
                                            else
                                                {
                                                    echo '<input type="hidden" name="statut" value="0"/>';
                                                }
                                        ?>
                                      
                                      <input type="hidden" name="enreg" value="photo"/>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" id="photo" type="submit">Enregistrer </button>
                                              <input class="btn btn-default" type="reset" value="Annuler" />
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>        
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

</body>

</html>
