<?php 
	require_once('aut/bdconnect.php');

	session_start();	

	//$_SESSION['file-input'] = $_SESSION['file_data']['file-input'];
	//var_dump($_SESSION['file-input']);
	//echo $_SESSION['file-input']['name'];

	if($_POST['enregistrer']=='user'){
		if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['telephone']) && !empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['villes']) && !empty($_POST['kwatas']) && !empty($_POST['sectos']) && !empty($_POST['metiers']) && !empty('type_compte')){
			if(!empty($_FILES['file-input']) AND $_FILES['file-input']['error'] == 0){
				if ($_FILES['file-input']['size'] <= 6500000){
					/*add_filter('wp_handle_upload_prefilter','tc_handle_upload_prefilter');*/
					if (filter($_FILES['file-input'])){
						$infosfichier = pathinfo($_FILES['file-input']['name']);
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

						if (in_array($extension_upload, $extensions_autorisees)){
							$dat = date('mYHis');

							$nm = 'pub'.$dat.'.'.$extension_upload;
							$lieu = "image/{$nm}";
							$resultat = move_uploaded_file($_FILES['file-input']['tmp_name'], $lieu);
							if ($resultat){
								$photo=$nm;
							}

							$query = $bdd->prepare('SELECT * FROM kh_kwata WHERE nom_kwata = ?');
							$query->execute(array($_POST['kwata']));
							$rep = $query->fetchAll();
							foreach ($rep as $reponse) {
								$kwata = $reponse['id_kwata'];
							}

							$query = $bdd->prepare('SELECT * FROM kh_metier WHERE nom_metier = ?');
							$query->execute(array($_POST['job']));
							$rep = $query->fetchAll();
							foreach ($rep as $reponse) {
								$job = $reponse['id_metier'];
							}							
							
							if(!empty($_POST['email'])){
								$query = $bdd->prepare('INSERT INTO kh_user (avatar, nom_user, prenom, telephone, secto, kh_metier_id, kh_kwata_id, email, pseudo, mdp, type_compte) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
								if($query->execute($photo, $_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['secto'], $job, $kwata, $_POST['email'], $_POST['pseudo'], shal($_POST['mdp']), $_POST['type_compte'])){
									$_SESSION['post_data']['adress'] = $_POST['tel'];
									header('Location:enreg_pub.php');
								}								
							}else{
								$query = $bdd->prepare('INSERT INTO kh_user (avatar, nom_user, prenom, telephone, secto, kh_metier_id, kh_kwata_id, pseudo, mdp, type_compte) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
								if($query->execute($photo, $_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['secto'], $job, $kwata, $_POST['pseudo'], shal($_POST['mdp']), $_POST['type_compte'])){
									$_SESSION['post_data']['adress'] = $_POST['tel'];									
									header('Location:enreg_pub.php');
								}
							}
							
							echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Vous avez ete enregistre avec succes </div>';
						}
					}else{
						echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Choisissez une image de 640*480 ou 2000*2000</div>';
					}
				}else{
					echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Choisissez une image de taille moins importante </div>';
				}
			}else{
				echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Choisissez une image valide </div>';
			}
		}else{
			echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> veuillez remplir les champs </div>';
		}		
	}

	function last_id(){
		$query = $bdd->prepare('SELECT last_insert_id() AS id FROM kh_user');
		if($query->execute()){
			$reponse = $query->fetchAll();
			foreach ($rep as $reponse) {
				$_SESSION['user'] = $rep['id'];
			}
		}
	}

	function enregistrer_pub(){
		
	}
?>