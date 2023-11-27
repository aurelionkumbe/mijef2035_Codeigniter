<?php
	require_once("aut/bdconnect.php");
	require_once("aut/session.php");
?>
	<?php
			
			//var_dump($_POST); die();
			
				$pge = $_POST['idart'];
			
			if(!empty($pge))
				{
					$reponse = $bdd ->prepare('SELECT * FROM kh_user WHERE id_user = ?');
					$reponse ->execute(array($pge));
					while ($donnees = $reponse ->fetch())
					   {
							$secto="";
							$kwata="";
							$job="";

							$id = $donnees['id_user'];
							$pseudo = $donnees['pseudo'];
							$nom = $donnees['nom_user'];
							$pnom = $donnees['prenom'];
							$email = $donnees['email'];
							$tel = $donnees['telephone'];
							$tusr = $donnees['type_user'];
							$sec = $donnees['kh_secto_id'];
							$jb = $donnees['kh_metier_id'];
							$kwat = $donnees['kh_kwata_id'];
							$tcpt = $donnees['type_compte'];
							$stat = $donnees['statut'];

							$rpnse = $bdd ->prepare('SELECT * FROM kh_secto WHERE id_secto = ?');
							$rpnse ->execute(array($sec));
							while ($dones = $rpnse ->fetch())
							   {				  
									$secto = $dones['nom_secto'];
								}
							$rpnse->closeCursor();

							$rpons = $bdd ->prepare('SELECT * FROM kh_kwata WHERE id_kwata = ?');
							$rpons ->execute(array($kwat));
							while ($done = $rpons ->fetch())
							   {				  
									$kwata = $done['nom_kwata'];
								}
							$rpons->closeCursor();

							$rpose = $bdd ->prepare('SELECT * FROM kh_metier WHERE id_metier = ?');
							$rpose ->execute(array($jb));
							while ($dons = $rpose ->fetch())
							   {				  
									$job = $dons['nom_metier'];
								}
							$rpose->closeCursor();
							
								if($stat != 0){ $statut = 'Valide';}
								else{ $statut = 'Invalide';}
							
								if($tusr == 0){ $tuser = 'Aucun'; }
								elseif($tusr == 1){ $tuser = 'Offre de service'; }
								elseif($tusr == 2){ $tuser = 'Demande de service'; }

								if($tcpt == 0){ $tcompte = 'Classique'; }
								elseif($tcpt == 1){ $tcompte = 'Premuim'; }
					
								echo '<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<h3>Modification de :'.$pseudo.'</h3>
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
															echo '<div class="form-group col-md-5">
																<label for="nm" class="control-label">Nom : '.$nom.'</label>
																<div class="">																	
																	<input class="form-control" id="nm" name="nom" type="text" /> 
																</div>
															</div>';

															echo '<div class="form-group col-md-6">
																<label for="nm" class="control-label col-md-offset-2">Prénom : '.$pnom.'</label>
																<div class="col-md-offset-2">																	
																	<input class="form-control" id="nm" name="pnom" type="text" /> 
																</div>
															</div>';

															echo '<div class="form-group col-md-5">
																<label for="nm" class="control-label">Pseudo : '.$pseudo.'</label>
																<div class="">																	
																	<input class="form-control" id="nm" name="pseudo" type="text" /> 
																</div>
															</div>';

															echo '<div class="form-group col-md-6">
																<label for="login" class="control-label col-md-offset-2">Email : '.$email.'</label>
																<div class="col-md-offset-2">																	
																	<input class="form-control" id="login" name="mail" type="mail" /> 
																</div>
															</div>';

															echo '<div class="form-group col-md-5">
																<label for="pass" class="control-label">Téléphone : '.$tel.'</label>
																<div class="">																	
																	<input class="form-control" id="pass" name="tel" type="tel" /> 
																</div>
															</div>';

															echo '<div class="form-group col-md-6">
																<label for="dac" class="control-label col-md-offset-2">Type d\'utilisation : '.$tuser.'</label>
																<div class="col-md-offset-2">																	
																	<select id="dac" class="form-control" name="tuser" >
																		<option value="">Ne pas changer</option>
																		<option value="1">Offrant</option>
																		<option value="2">Demandeur</option>
																	</select>
																</div>
															</div>';

															echo '<div class="form-group col-md-5">
																<label for="dac" class="control-label">Type de compte : '.$tcompte.'</label>
																<div class="">																	
																	<select id="dac" class="form-control" name="tcompte" >
																		<option value="">Ne pas changer</option>
																		<option value="0">Classique</option>
																		<option value="1">Premuim</option>
																	</select>
																</div>
															</div>';

															echo '<div class="form-group col-md-6">
																<label for="dac" class="control-label col-md-offset-2">Kwata : '.$kwata.'</label>
																<div class="col-md-offset-2">																	
																	<select id="dac" class="form-control" name="kwata" >
																		<option value="">Ne pas changer</option>';
																		$rpns = $bdd ->query('SELECT * FROM kh_kwata WHERE statut != 0');
																		while ($dons = $rpns ->fetch())
																		   {				  
																				$idcate = $dons['id_kwata'];
																				$nomcate = $dons['nom_kwata'];
																				
																				echo '<option value="'.$idcate.'">'.$nomcate.'</option>';
																			}
																		$rpns->closeCursor();
																	echo'</select>
																</div>
															</div>';

															echo '<div class="form-group col-md-5">
																<label for="dac" class="control-label">Secto : '.$secto.'</label>
																<div class="">																	
																	<select id="dac" class="form-control" name="secto" >
																		<option value="">Ne pas changer</option>';
																		$rns = $bdd ->query('SELECT * FROM kh_secto WHERE statut != 0');
																		while ($don = $rns ->fetch())
																		   {				  
																				$idcate = $don['id_secto'];
																				$nomcate = $don['nom_secto'];
																				
																				echo '<option value="'.$idcate.'">'.$nomcate.'</option>';
																			}
																		$rns->closeCursor();
																	echo'</select>
																</div>
															</div>';

															echo '<div class="form-group col-md-5">
																<label for="dac" class="control-label col-md-offset-2">Job : '.$job.'</label>
																<div class=" col-md-offset-2">																	
																	<select id="dac" class="form-control" name="job" >
																		<option value="">Ne pas changer</option>';
																		$rps = $bdd ->query('SELECT * FROM kh_metier WHERE statut != 0');
																		while ($dos = $rps ->fetch())
																		   {				  
																				$idcate = $dos['id_metier'];
																				$nomcate = $dos['nom_metier'];
																				
																				echo '<option value="'.$idcate.'">'.$nomcate.'</option>';
																			}
																		$rps->closeCursor();
																	echo'</select>
																</div>
															</div>';
															
														
															echo '<div class="form-group col-md-9">
															<input type="hidden" name="modif" value="user"/>
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