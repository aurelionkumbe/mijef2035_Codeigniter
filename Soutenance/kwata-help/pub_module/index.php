<?php 
	require_once('aut/bdconnect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.10.4.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-imgupload.min.css">
		<title>Pub - Promo</title>
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

			#resultat{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
			}

			#resultat1{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
			}

			#resultat2{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
			}

			#resultat3{
				max-height: 250px;
				overflow: hidden;
				z-index: 10;
				border-radius: 3px;
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

			#form{
				margin-top: 5%;
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
							<h2>Publicite</h2>
						</div>
					</div>						
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						<form action="enreg_pub.php" class="form-validate" id="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="text">Texte </label>
								<textarea class="form-control" name="text" id="text" placeholder="Ajoute un texte ou pas"></textarea>
							</div>

							<div class="form-group">
								<label>Image</label>
		                        <input type="file" required name="file-input" class="form-control" id="files" multiple=true required autocomplete="off"/>
			                </div>

							<div class="form-group">
								<label>Population Ciblee </label>
								<div class="row">
									<div class="col-lg-4">
										<input class="form-control" required id="ville" type="text" name="ville" required class="ke" placeholder="Entre ta ville" autocomplete="off"/>
										<div id="resultat" style="position : absolute"><ul></ul></div>
									</div>
									<div class="col-lg-4">
										<input class="form-control" required id="kwata" type="text" class="ke" required name="kwata" placeholder="Entre ton kwat" autocomplete="off"/>
										<div id="resultat1" style="position : absolute"><ul></ul></div>
									</div>
									<div class="col-lg-4">
										<input class="form-control" required id="secto" type="text" class="ke" required name="secto" placeholder="Entre ton secto" autocomplete="off"/>
										<div id="resultat2" style="position : absolute"><ul></ul></div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="">
									<label for="metier">Metier </label>
									<input type="text" class="form-control" required id="metier" class="ke" name="job" required placeholder="Entre ta profession" autocomplete="off"/>
									<div id="resultat3" style="position : absolute"><ul></ul></div>
								</div>
							</div>

							<div class="form-group">
								<label for="budget">Budget </label>						
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="warm"></div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<select id="bud" class="form-control">
											<option value="0">Choisissez un montant</option>
											<option value="1">500</option>
											<option value="2">1000</option>
											<option value="3">2000</option>
											<option value="4">5000</option>
											<option value="5">10000</option>
											<option value="6">Autre</option>
										</select>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<input type="text" class="form-control" id="budget" placeholder="Entrez votre montant" autocomplete="off" style="display:none"/>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<input type="text" class="form-control" required placeholder="Nombre de vues" id="bget" name="budget" style="display:none"/>
									</div>
								</div>
							</div>
												
							<div class="form-group">
								<label for="budget">Duree </label>
								<div class="row">
									<div class="col-lg-4">
										<input name="date1" id="date1" type="date" required placeholder="Debut" class="form-control"  autocomplete="off"/>
									</div>
									<div class="col-lg-4">								
										<input name="date2" id="date2" type="date" required placeholder="Fin" class="form-control"  autocomplete="off"/>
									</div>
									<div class="col-lg-4">
										<input type="text" name="audi" id="audi" placeholder="Duree en jours" class="form-control" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="adress">Adresse</label>
								<input type="text" id="adress" class="form-control" required name="address" placeholder="Telephone ou adresse e-mail" autocomplete="off">
							</div>

							<div class="form-group">
								<label for="adress">Site</label>
								<input type="text" id="site" class="form-control" name="url" placeholder="e-mail"  autocomplete="off">
							</div>

							<div class="form-group">
								<input type="hidden" value="hiden" name="send" id="send" />
								<input type="submit" class="btn btn-default" id="sub" />
								<input type="reset" class="btn btn-default"/>
							</div>					

							<!--div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 camtel pay">
									<img src="image/orange.png"/>
								</div>

								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 orange pay">
									<img src="image/orange.png" />
								</div>

								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 mtn pay">
									<img src="image/orange.png" />
								</div>
							</div-->
						</form>
					</div>

					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						<div class="form-group">
							<p class="text" class="col-md-12 col-lg-12 col-xs-12 col-sm-12"></p>
							<div class="row">
								<img id="image" class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive" style="min-height:400px !important; max-height:400px !important;">
							</div>
						</div>
					</div>
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
            </div>
            <!-- /.modal -->
		</div>
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
			}
        </script>
        <script type="text/javascript">
        	$('#form').submit(function(e){        		
                var dataString = new FormData(this);
                                
                $.ajax({
                    type: "POST",
                    data: dataString,
                    url: 'enreg_pub.php',
                    mimeType:"multipart/form-data",
	                contentType: false,
	                cache: false,
	                processData:false,
                    error:function(msg){
                        $(".modal-body").addClass("tableau_msg_erreur").fadeOut(800).fadeIn(800).fadeOut(400).fadeIn(400).html('<div style="margin-right:auto; margin-left:auto; text-align:center">Impossible de charger cette page</div>');
                    },
                    success:function(data){                     	
                    	if(data){
                    		$('#myModal2').modal('show');
                   			$(".modal-body").fadeIn(2000).html('<div style="text-align:center; margin-right:auto; margin-left:auto">Patientez...</div>');
                   			$('#myModal2').modal('hide');
                    		document.location = "inscription_kwatahelp.php";
                    	}else{
                    		$('#myModal2').modal('show');
                    		$(".modal-body").fadeIn(2000).html('<div style="text-align:center; margin-right:auto; margin-left:auto">Patientez...</div>');
                    		$(".modal-body").fadeIn(2000).html(data);
                    	}
                    }
                });
				e.preventDefault();
            });
        </script>
		<script type="text/javascript">
			$('#text').keyup(function(){
				var $val = $(this);
				$('.text').text($val.val());
				$('.text').css('text-align', 'justify');
				$('.text').css('text-justify', 'inter-word');
				$('.text').css('background-color', 'white');
				$('.text').css('border-radius', '2px');
			});

			$('#ville').keyup(function(){
				var nom = $('#ville').attr('id');
				if($('#ville').val() == ""){
					$(this).parent().find('ul').hide();
				}else{
					$(this).parent().find('ul').show();
				}
				if (nom == "ville") {
					var ville = $('#ville').val();
					$.ajax({
						url: 'autocomplete.php',
						type: 'post',
						data: 'name='+nom+'&ville='+ville,
						success:function(data){
							$('#resultat ul').html(data);
						}
					});
				}
			});

			$('#secto').keyup(function(){
				var nom = $('#secto').attr('id');
				if($('#secto').val() == ""){
					$(this).parent().find('ul').hide();
				}else{
					$(this).parent().find('ul').show();
				}
				if (nom == "secto") {
					var secto = $('#secto').val();					
					$.ajax({
						url: 'autocomplete.php',
						type: 'post',
						data: 'name='+nom+'&secto='+secto,
						success:function(data){
							$('#resultat2 ul').html(data);		
						}
					});
				}
			});

			$('#kwata').keyup(function(){
				var nom = $('#kwata').attr('id');
				if($('#kwata').val() == ""){
					$(this).parent().find('ul').hide();
				}else{
					$(this).parent().find('ul').show();
				}
				if (nom == "kwata") {
					var kwata = $('#kwata').val();					
					$.ajax({
						url: 'autocomplete.php',
						type: 'post',
						data: 'name='+nom+'&kwata='+kwata,
						success:function(data){
							$('#resultat1 ul').html(data);	
						}
					});
				}
			});

			$('#metier').keyup(function(){
				var nom = $('#metier').attr('id');
				if($('#metier').val() == ""){
					$(this).parent().find('ul').hide();
				}else{
					$(this).parent().find('ul').show();
				}
				if (nom == "metier") {
					var job = $('#metier').val();					
					$.ajax({
						url: 'autocomplete.php',
						type: 'post',
						data: 'name='+nom+'&job='+job,
						success:function(data){
							$('#resultat3 ul').html(data);	
						}
					});
				}
			});

			function choose(item, a){
				if(a == 1){
					$('#ville').val(item);
					$('#resultat').hide();
				}

				if(a == 2){
					$('#metier').val(item);
					$('#resultat3').hide();
				}

				if (a == 4){
					$('#kwata').val(item);
					$('#resultat1').hide();
				}

				if (a == 3){
					$('#secto').val(item);
					$('#resultat2').hide();
				}
			}
			
		  	/*$(document).ready(function() {
			    $("#datepicker").datepicker();
			    $("#datepicker2").datepicker();
		  	});*/

		  	$('#date2').change(function(){
		  		var fit_start_time  = $("#date1").val(); //2013-09-5
				var fit_end_time    = $("#date2").val(); //2013-09-10				

				if(Date.parse(fit_start_time) >= Date.parse(fit_end_time)){
				    alert("Please select a different End Date.");
				    $("#date2").val('');
				    $("#date2").focus();
				}else{
					var dayDiff = Math.ceil((Date.parse(fit_end_time) - Date.parse(fit_start_time)) / (1000 * 60 * 60 * 24));
					$("#audi").val(dayDiff+" jours");
				}
		  	});

		  	$('#date1').change(function(){
		  		var moment_time = new Date();		  		
		  		var fit_start_time  = $("#date1").val(); //2013-09-5		  		
				if(Date.parse(fit_start_time) <= moment_time){
					alert("Please select a different First Date.");
					$("#date1").val('');
				    $("#date1").focus();
				}
		  	});
			
			$('#bud').change(function(){
				if($(this).val() == 6){
					$('#budget').css('display', 'block');
					$('#bget').css('display', 'none');
				}else{
					$('#budget').css('display', 'none');
					if($(this).val() == 0){
						$('#bget').css('display', 'none');
					}else{
						$('#bget').css('display', 'block');

						if($(this).val() == 1){
							$('#bget').val(50+" vues possibles");
						}else{
							if($(this).val() == 2){
								$('#bget').val(100+" vues possibles");
							}else{
								if($(this).val() == 3){
									$('#bget').val(200+" vues possibles");
								}else{
									if($(this).val() == 4){
										$('#bget').val(500+" vues possibles");
									}else{
										$('#bget').val(1000+" vues possibles");
									}
								}
							}
						} 
					}					
				}
			});

			$('#budget').keyup(function(){
				if($('#budget').val().trim().length > 0){
					if(is_int(parseInt($('#budget').val())/10)){
						$('#bget').val(parseInt($('#budget').val())/10+" vues possibles");
						$('#bget').css('display', 'block');
						$('#warm').html('');
						$('#budget').css('background', 'white');
					}else{
						$('#warm').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Entrez une somme multiple de 10</div>');
						$('#warm').show();					
						$('#budget').css('background', 'red');
						$('#bget').css('display', 'none');					
					}
				}else{
					$('#bget').css('display', 'none');
					$('#warm').html('');
					$('#budget').css('background', 'white');
				}
			});
			
			function is_int(value){
			  	if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
			      	return true;
			  	}else{
					return false;
			  	}
			}			
		</script>
		<!--script type="text/javascript">
			$('.pay').click(function(){											
				var all = $('#form').serialize();
				
				/*var ville = $('#ville').val();
				var kwata = $('#kwata').val();
				var secto = $('#secto').val();
				var job = $('#metier').val();			
				var budget = $('#budget').val();
				var date1 = $('#date1').val();
				var date2 = $('#date2').val();
				var text = $('#text').val();
				var img = $('#files').val().split(' ')[2];
				var send = $('#send').val();
				var dataString = 'text='+text+'&ville='+ville+'&secto='+secto+'&job='+job+'&kwata='+kwata+'&budget='+budget+'&date1='+date1+'&date2='+date2+'&img='+img+'&send='+send;´*/

				$.ajax({
					url : 'enreg_pub.php',
					type : 'post',
					data : all,
					success:function(data){
						alert(data);
					}
				});
			});
		</script-->
	</body>
</html>