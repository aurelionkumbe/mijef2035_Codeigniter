<?php
	require_once("aut/bdconnect.php");
	require_once("aut/session.php");
?>
	<?php
				$pge = $_POST['idart'];
			
			if(!empty($pge))
				{
					$reponse = $bdd ->prepare('SELECT * FROM kh_galerie WHERE id_galerie = ?');
					$reponse ->execute(array($pge));
					while ($donnees = $reponse ->fetch())
					   {
							$id = $donnees['id_galerie'];
							$titre = $donnees['titre'];
							$texte = $donnees['texte'];
							$image = $donnees['image'];
							$lie = $donnees['kh_cat_galerie_id'];
							$stat = $donnees['statut'];
							
								if($stat != 0){ $statut = 'Oui';}
								else{ $statut = 'Non';}
								
							$rponse = $bdd ->prepare('SELECT * FROM kh_cat_galerie WHERE id_catgalerie = ?');
							$rponse ->execute(array($lie));
							while ($donees = $rponse ->fetch())
							   {				  
									$lien = $donees['nom_cat'];
								}
							$rponse->closeCursor();
					
								echo '<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h3>Modification du :'.$titre.'</h3>
											</header>
											<div id="resultat"></div>

											<div class="col-md-12">
												<section class="panel">
													<header class="panel-heading">
														<h4>Information</h4>
													</header>													
													Publiée : <b>'.$statut.'</b>
												</section>
											</div>

											<div class="row">									
												<div class="col-md-12">
													<section class="panel">														
														<div class="form">
														<form class="form-validate form-horizontal " id="modif_form" method="post" action="modification.php">';
															echo '<div class="form-group col-md-9">
																<label for="ico" class="control-label">Photo : </label>
																<div class="">
																	<img class="post" src="../img/galerie/'.$image.'" alt="" />
																</div>
																<div class="">
																	<input class="form-control" id="ico" name="photo" type="file" />
																</div>
															</div>';

															echo '<div class="form-group col-md-12">
																<label for="tex" class="control-label">Texte : </label>
																<div class="">
																	<p>'.$texte.'</p>
																	<input class="form-control " id="tex" name="texte" type="text" /> 
																</div>
															</div>';

															echo '<div class="form-group col-md-6">
																<label for="tit" class="control-label">Titre : </label>
																<div class="">
																	<p>'.$titre.'</p>
																	<input class="form-control " id="tit" name="titre" type="text" /> 
																</div>
															</div>';
															
															echo '<div class="form-group col-md-6">
																<label for="dac" class="control-label col-md-offset-2">Catégorie : </label>
																<div class="col-md-offset-2">
																	<p>'.$lien.'</p>
																	<select id="dac" class="form-control" name="lien" >
																		<option value="">Ne pas changer</option>';
																		$rpns = $bdd ->query('SELECT * FROM kh_cat_galerie WHERE statut != 0');
																		while ($dons = $rpns ->fetch())
																		   {				  
																				$idcate = $dons['id_catgalerie'];
																				$nomcate = $dons['nom_cat'];
																				
																				echo '<option value="'.$idcate.'">'.$nomcate.'</option>';
																			}
																		$rpns->closeCursor();
																	echo '</select>
																</div>
															</div>';
															
															
														
														echo '<div class="form-group col-md-9">
															<input type="hidden" name="modif" value="photo"/>
															<input type="hidden" name="id_obj" value="'.$id.'"/>
															<button class="btn btn-success" type="submit"> Modifier</button>
															</div>';
													
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