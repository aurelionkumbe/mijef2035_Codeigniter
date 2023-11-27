<?php 
	require_once('aut/bdconnect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.10.4.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-imgupload.min.css">
		<title>Inscription - Kwatahelp</title>
		<style type="text/css">
			div img{
				cursor: pointer;
				padding-top: 20px;				
				max-height: 70%;				
			}

			div ul{
				padding-left: 1% !important;
				padding-right: 1% !important;
				padding-top: 1% !important;
				padding-bottom: 1% !important;
			}

			div ul li{
				list-style: none;
			}

			div ul li:hover{
				background-color: black;
				color: white;
				cursor: pointer;
			}

			div ul{
				background-color: white;
				text-align: center;
			}

			body{
				background-color: blue;
			}

			.text{
				margin-top: 5%;
				padding: 1%;
			}

			#title{
				background-color: white;
				margin-left: 0px !important;
				padding-bottom: 5%;
				padding-top: 5%;				
				font-size: 2em !important;
				font-weight: 600;
				font-family: ALGERIAN;
				letter-spacing: 15px;
			}

			#resultat_ins{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
			}

			#resultat1_ins{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
			}

			#resultat2_ins{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
			}

			#resultat3_ins{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
			}

			#theme_formulaire{
				background-color: rgb(107,190,24);
				margin-top: 3%;
				margin-bottom: 3%;
				padding-bottom: 2%;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="theme_formulaire">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
							<div class="row">
								<img src="image/logo.jpg" class="img-responsive" width="61%" style="padding-top:0px !important;padding-right:0px !important">
							</div>
						</div>

						<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9" id="title">
							<h2>Inscription-kwatahelp</h2>
						</div>
					</div>						
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<form id="inscript-form" class="form-validate" action="enreg_user.php" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Avatar</label>
									<input type="file"  name="file-input" id="files_ins" class="form-control" placeholder="Avatar" multiple="true">
									<div class="row">
										<img class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive" style="width:60% !important;max-height:150px;">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Nom</label>
									<input type="text"  name="nom" class="form-control" placeholder="Nom" autocomplete="off">
								</div>

								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Prenom</label>
									<input type="text"  name="prenom" class="form-control" placeholder="Prenom" autocomplete="off">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Pseudo</label>
									<input type="password"  name="pseudo" class="form-control" placeholder="Pseudo" autocomplete="off">
								</div>

								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Password</label>
									<input type="text"  name="mdp" class="form-control" placeholder="Password" autocomplete="off">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Telephone</label>
									<input type="tel"  name="tel" class="form-control" placeholder="Telephone" autocomplete="off">
								</div>

								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Email</label>
									<input type="email" name="email" class="form-control alert" placeholder="e-mail" id="email" autocomplete="off">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Ville</label>
									<input type="text"  name="villes" id="ville_ins" class="form-control" placeholder="Ville" autocomplete="off">
									<div id="resultat_ins" style="position : absolute"><ul></ul></div>
								</div>

								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Kwata</label>
									<input type="text"  id="kwata_ins" name="kwatas" class="form-control" placeholder="Kwata" autocomplete="off">
									<div id="resultat1_ins" style="position : absolute"><ul></ul></div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Secto</label>
									<input type="text" id="secto_ins" name="sectos" class="form-control" placeholder="Secto" autocomplete="off">
									<div id="resultat2_ins" style="position : absolute"><ul></ul></div>
								</div>

								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Metier</label>
									<input type="text" name="metiers" id="metier_ins" class="form-control" placeholder="Domaine" autocomplete="off">
									<div id="resultat3_ins" style="position : absolute"><ul></ul></div>
								</div>
							</div>

							<div class="row">
								<!--div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Type d'utilisateur</label>
									<select class="form-control" name="type_user">
										<option value="0"></option>
										<option value="1"></option>
									</select>
								</div-->

								<div class="form-group col-lg-6 col-md-6 col-xs-12 col-sm-6">
									<label>Type de compte</label>
									<select class="form-control" name="type_compte">
										<option value="0">Classique</option>
										<option value="1">Premium</option>
									</select>
								</div>
							</div>

							<input type="submit" name="sub" class="btn btn-default">
							<input type="reset" class="btn btn-default">
							<input type="hidden" name="enregistrer" value="user">
						</form>
					</div>

					<!--div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						<div class="form-group">
							<p class="text" class="col-md-12 col-lg-12 col-xs-12 col-sm-12"></p>
							<div class="row">
								<img id="image" class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive" style="min-height:400px !important; max-height:400px !important;">
							</div>
						</div>
					</div-->
			</div>				
		</div>

		<!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog affmodal">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> Kwatahelp - Inscription</h4>
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
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
		    <!--script type="text/javascript" src="js/bootstrap-imgupload.js"></script-->
		    <script type="text/javascript" src="js/jquery-ui-1.10.4.min.js"></script>                
			<script type="text/javascript">
				document.getElementById("files").onchange = function () {
				    var reader = new FileReader();

				    reader.onload = function (e) {
				        // get loaded data and render thumbnail.
				        document.getElementById("image").src = e.target.result;
				    };

				    // read the image file as a data URL.
				    reader.readAsDataURL(this.files[0]);
				};
			</script>
			<script type="text/javascript">
				$('#inscript-form').submit(function(e){
					
					var formObj = $(this);
				    var formData = new FormData(this);            
				    var formUrl = formObj.attr("action");            
				    $(".modal-body").fadeIn(2000).html('<div style="text-align:center; margin-right:auto; margin-left:auto">Patientez...</div>');
				    $('#myModal2').modal('show');
				    $.ajax({
				    	url: formUrl,
				        type: "POST",
				        data: formData,
				        mimeType:"multipart/form-data",
				        contentType: false,
				        cache: false,
				        processData:false,
				        error:function(msg){
				            $(".modal-body").addClass("tableau_msg_erreur").fadeOut(800).fadeIn(800).fadeOut(400).fadeIn(400).html('<div style="margin-right:auto; margin-left:auto; text-align:center">Impossible de charger cette page</div>');
				        },
				        success:function(data){
				        	$("#inscript-form").get(0).reset();            		
				            $(".modal-body").fadeIn(2000).html(data);
				        }
				    });
				    e.preventDefault();
				});		

				$('#email').keyup(function(e){
					var mail = $('#email').val();

					if(e.keycode == 13){
						e.preventDefault();
					}
					
					if (mail.split('@')[1].length > 0) {
						if(mail.split('@')[1].split('.')[1].length > 0){
							var finalstring = mail.split('@')[1].split('.')[1];
							if (finalstring.length >= 2){
								alert('true');
							}
						}
					}
				});

				$('#ville_ins').keyup(function(){
					var nom = $('#ville_ins').attr('id');
					if($('#ville_ins').val() == ""){
						$(this).parent().find('ul').hide();
					}else{
						$(this).parent().find('ul').show();
					}
					if (nom == "ville_ins") {
						var ville = $('#ville_ins').val();
						$.ajax({
							url: 'autocomplete_ins.php',
							type: 'post',
							data: 'name='+nom+'&villes='+ville,
							success:function(data){
								$('#resultat_ins ul').html(data);
							}
						});
					}
				});

				$('#secto_ins').keyup(function(){
					var nom = $('#secto_ins').attr('id');
					if($('#secto_ins').val() == ""){
						$(this).parent().find('ul').hide();
					}else{
						$(this).parent().find('ul').show();
					}
					if (nom == "secto_ins") {
						var secto = $('#secto_ins').val();					
						$.ajax({
							url: 'autocomplete_ins.php',
							type: 'post',
							data: 'name='+nom+'&sectos='+secto,
							success:function(data){
								$('#resultat2_ins ul').html(data);		
							}
						});
					}				
				});

				$('#kwata_ins').keyup(function(){
					var nom = $('#kwata_ins').attr('id');
					if($('#kwata_ins').val() == ""){
						$(this).parent().find('ul').hide();
					}else{
						$(this).parent().find('ul').show();
					}
					if (nom == "kwata_ins") {
						var kwata = $('#kwata_ins').val();					
						$.ajax({
							url: 'autocomplete_ins.php',
							type: 'post',
							data: 'name='+nom+'&kwatas='+kwata,
							success:function(data){
								$('#resultat1_ins ul').html(data);	
							}
						});
					}
				});

				$('#metier_ins').keyup(function(){
					var nom = $('#metier_ins').attr('id');
					if($('#metier_ins').val() == ""){
						$(this).parent().find('ul').hide();
					}else{
						$(this).parent().find('ul').show();
					}
					if (nom == "metier_ins") {
						var job = $('#metier_ins').val();					
						$.ajax({
							url: 'autocomplete_ins.php',
							type: 'post',
							data: 'name='+nom+'&job='+job,
							success:function(data){
								$('#resultat3_ins ul').html(data);	
							}
						});
					}
				});

				function chooses(item, a){
					if(a == 1){
						$('#ville_ins').val(item);
						$('#resultat_ins').hide();
					}

					if(a == 2){
						$('#metier_ins').val(item);
						$('#resultat3_ins').hide();
					}

					if (a == 4){
						$('#kwata_ins').val(item);
						$('#resultat1_ins').hide();
					}

					if (a == 3){
						$('#secto_ins').val(item);
						$('#resultat2_ins').hide();
					}
				}
			</script>
	</body>
</html>