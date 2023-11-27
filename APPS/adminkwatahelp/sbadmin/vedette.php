﻿<?php
	require_once("aut/bdconnect.php");
	require_once("aut/session.php");
?>

	<?php
			
				$pge = $_POST['idart'];
			
			if(!empty($pge))
				{
					$reponse = $bdd ->prepare('SELECT * FROM kh_vedette WHERE id_vedette = ?');
					$reponse ->execute(array($pge));
					while ($donnees = $reponse ->fetch())
					   {
							$id = $donnees['id_vedette'];
							$titre = $donnees['titre'];
							$texte = $donnees['texte'];
							$image = $donnees['image'];
							$stat = $donnees['statut'];
							
								if($stat != 0){ $statut = 'Oui';}
								else{ $statut = 'Non';}						
					
								echo '<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h3>Modification de : '.$titre.'</h3>
											</header>
											<div id="resultat"></div>

											<div class="col-md-4">
												<section class="panel">
													<header class="panel-heading">
														<h4>Information</h4>
													</header>
													Statut : <b>'.$statut.'</b>
												</section>
											</div>

											<div class="row">									
												<div class="col-md-12">
													<section class="panel">														
														<div class="form">
														<form class="form-validate form-horizontal " id="modif_form" method="post" action="modification.php">';
															echo '<div class="row">
																<div class="form-group col-md-6">
																	<label for="ico" class="control-label">Image : </label>
																	<div class="" style="height: 100px">
																		<img class="post" src="../img/'.$image.'" alt="" />
																	</div>
																	<div class="">
																		<input class="form-control" id="ico" name="image" type="file" />
																	</div>
																</div>
															</div>';
															
															echo '<div class="row col-md-12">
																<div class="form-group col-md-6">
																	<label for="tit" class="control-label">Titre : </label>																	
																	<input type="text" value="'.$titre.'" disabled>
																</div>

																<div class="form-group col-md-6">																																		
																	<input class="form-control" id="tit" name="titre" type="text" /> 																	
																</div>
																
															</div>';

															echo '<div class="row col-md-12">
																<div class="form-group col-md-6">
																	<label for="tex" class="control-label">Texte : </label>																																		
																	<textarea disabled> '.$texte.'</textarea>
																</div>																															

																<div class="form-group col-md-6">
																	<input class="form-control" id="tex" name="texte" type="text" /> 																	
																</div>									
															</div>';

														echo '<input type="hidden" name="modif" value="vedette"/>
															<input type="hidden" name="id_obj" value="'.$id.'"/>
															<button class="btn btn-success" type="submit"> Modifier</button>';
													
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