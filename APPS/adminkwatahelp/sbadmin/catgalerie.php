<?php
	require_once("aut/bdconnect.php");
	require_once("aut/session.php");
?>
	<?php
				$pge = $_POST['idart'];
			
			if(!empty($pge))
				{
					$reponse = $bdd ->prepare('SELECT * FROM kh_cat_galerie WHERE id_catgalerie = ?');
					$reponse ->execute(array($pge));
					while ($donnees = $reponse ->fetch())
					   {
							$id = $donnees['id_catgalerie'];
							$titre = $donnees['nom_cat'];
							$tag = $donnees['tag'];
							$stat = $donnees['statut'];
							
								if($stat != 0){ $statut = 'Oui';}
								else{ $statut = 'Non';}
					
								echo '<div class="col-lg-12">
										<section class="panel">
											<header class="panel-heading">
												<h3>Modification de la : '.$titre.'</h3>
											</header>
											<div id="resultat"></div>

											<div class="col-lg-12">
												<section class="panel">
													<header class="panel-heading">
														<h4>Information</h4>
													</header>
													Tag : <b>'.$tag.'</b><br>
													Publiée : <b>'.$statut.'</b>
												</section>
											</div>

											<div class="row">									
												<div class="col-lg-8">
													<section class="panel">														
														<div class="form">
														<form class="form-validate form-horizontal" id="modif_form" method="post" action="modification.php">';
															echo '<div class="row">';

															echo '<div class="form-group col-lg-12">
																<label for="tit" class="control-label col-lg-4">Nom : </label>
																<div class="col-lg-4">
																	<p>'.$titre.'</p>
																	<input type="text" class="form-control" id="tit" name="titre"/> 
																</div>
															</div>';	

															echo '</div>';

															echo '<div class="row col-lg-4">';
															
															echo '<input type="hidden" name="modif" value="catgal"/>
																<input type="hidden" name="id_obj" value="'.$id.'"/>
																<button class="btn btn-success" type="submit"> Modifier</button>';

															echo '</div>';
													
														echo '</form>
														</div>
													</section>
												</div>												
											</div>
										</section>
									</div>';
					
					}
					$reponse->closeCursor();
				}
		
	   ?>
	    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
	
	
	<script>
		$("#modif_form").submit(function(e)
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
								$("#modif_form").get(0).reset();
							}
					}
			});				
		   e.preventDefault();
			});$("#modif_form").submit(); //EOF
	</script>