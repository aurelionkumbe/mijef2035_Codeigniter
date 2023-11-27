<?php
	require_once("aut/bdconnect.php");
	require_once("aut/session.php");
?>
	<?php
			
			//var_dump($_POST); die();
			
				$pge = $_POST['idart'];
			
			if(!empty($pge))
				{
					$reponse = $bdd ->prepare('SELECT * FROM kh_services WHERE id_service = ?');
					$reponse ->execute(array($pge));
					while ($donnees = $reponse ->fetch())
					   {
							$arrond="";

							$id = $donnees['id_service'];
							$nom = $donnees['libelle'];
							$stat = $donnees['statut'];

								if($stat != 0){ $statut = 'Publié';}
								else{ $statut = 'Non publié';}
					
								echo '<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h3>Modification du :'.$nom.'</h3>
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
															echo '<div class="form-group col-md-8">
																<label for="nm" class="control-label">Nom de la ville : </label>
																<p>'.$nom.'</p>
																<div class="">																	
																	<input class="form-control " id="nm" name="nom" type="text" /> 
																</div>
															</div>';														
														
														echo '<div class="form-group col-md-8">
															<input type="hidden" name="modif" value="serv"/>
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