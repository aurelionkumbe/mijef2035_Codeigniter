<?php 
	$page = "admin log"; 
	require_once("aut/bdconnect.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php //echo $description; ?>" />
	<meta name="author" content="<?php //echo $author; ?>" />
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="../img/log.png ?>">

    <title>Admin-Kwata &middot; <?php echo $page; ?></title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">
	<div id="resultat"></div>
      <form class="login-form" id="log_form" action="aut/authentification.php" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="login" placeholder="Login" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            <label class="checkbox">
                <!-- <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span> -->
            </label>
            <button id="connect" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
        </div>
      </form>

    </div>

	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		/* $("button#connect").click(function() 
			{ 
				$.ajax({
				type: "POST",
				url: "aut/authentification.php",
				data: $('form#log_form').serialize(),
					success: function(data){
						if(data!='')
							{
								
								$("#resultat").html('<div class="alert alert-info" style="display: block"><a class="close" data-dismiss="alert">×</a>'+data+'</div>');
								$("#log_form").get(0).reset();
							}
					}
			});			
		   return false;
			}); */ //EOF
	</script>
	
  </body>
</html>
