<?php
$page="Infos";
$eng="News";
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
    <!--link href="css/style.css" rel="stylesheet"-->

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
        </div><!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <h2 class="text-center well">Nouvelle pub</h2>
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-8 col-lg-offset-2">
            <form id="pub_form" method="post"  action="enregistrement.php">
                <div class="row">
                <div id="resultat"></div>
                    <div class="col-lg-5">
                        <div class=" col-lg-12">

                            <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon label-primary" id="basic-addon1" style="color: white; min-width: 80px; border-radius: 0px; border: 2px;">Image:</span>
                                    <input type="file" class="form-control" name="image" style="border-radius: 0px;">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 30px">
                                <div class=" input-group">
                                    <label for="publier" class="input-group-addon form-control label-primary input-d" style="color: white; min-width: 80px; border-radius: 0px; border: 2px;">Priorité</label>
                                <span class="input-group-addon" >
                                    <input type="number" name="rang">
                                </span>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 30px">
                                <div class=" input-group">
                                    <label for="publier" class="input-group-addon form-control label-primary input-d" style="color: white; min-width: 80px; border-radius: 0px; border: 2px;">Publier</label>
                                <span class="input-group-addon" >
                                    <input type="radio" name="statut" id="publier" value="oui">
                                </span>
                                <span class="input-group-addon" >
                                    <input type="radio" name="statut" id="nonpublier" value="non" checked>
                                </span>
                                    <label for="nonpublier" class="input-group-addon form-control label-primary" style="color: white; min-width: 80px; border-radius: 0px; border: 2px;">Non publier</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-6">
                        <div class="input-group">
                            <label for="texte" class="input-group label-primary form-control" style="color: white; border-radius: 0px; border: 2px;">Texte</label>
                            <textarea name="texte" id="texte" cols="100%" rows="7" class="form-control" placeholder=" Entrer votre Texte!" style=" border-radius: 0px;"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="enreg" value="pub"/>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 20px">
                        <input type="submit" name="send" id="send" class="form-control btn-success" style=" border-radius: 0px; margin-bottom: 0px;">
                    </div>
                </div>
            </form>
        </div>
    </div>


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
