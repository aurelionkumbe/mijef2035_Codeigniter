<?php 
	require_once('aut/bdconnect.php');

	session_start();

	$_SESSION['post_data'] = $_POST;
	$_SESSION['file_data'] = $_FILES;

	if($_SESSION['post_data']['send'] == 'hiden'){

		if(!empty($_SESSION['post_data']['address'])){			

			$result = strchr($_SESSION['post_data']['address'], "@");

			if(strlen($result) == 0){
				$query = $bdd->prepare('SELECT * FROM kh_user WHERE telephone = ?');
			}else{
				$query = $bdd->prepare('SELECT * FROM kh_user WHERE email = ?');
			}
			
			$query->execute(array($_SESSION['post_data']['address']));
			$rep = $query->fetchAll();

			//var_dump($_SESSION['post_data']);

			if(count($rep) == 0){
				echo true;
			}else{
				foreach ($rep as $reponse){
					$user = $reponse['id_user'];
				}
				if(!empty($_SESSION['post_data']['ville']) && !empty($_SESSION['post_data']['kwata']) && !empty($_SESSION['post_data']['secto']) && !empty($_SESSION['post_data']['job']) && !empty($_SESSION['post_data']['date1']) && !empty($_SESSION['post_data']['date2'])){
					if(!empty($_SESSION['file_data']['file-input']) AND $_SESSION['file_data']['file-input']['error'] == 0){
						if ($_SESSION['file_data']['file-input']['size'] <= 6500000){
							/*add_filter('wp_handle_upload_prefilter','tc_handle_upload_prefilter');*/
							if (filter($_SESSION['file_data']['file-input'])){
								$infosfichier = pathinfo($_SESSION['file_data']['file-input']['name']);
								$extension_upload = $infosfichier['extension'];
								$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

								if (in_array($extension_upload, $extensions_autorisees)){
									$dat = date('mYHis');

									$nm = 'pub'.$dat.'.'.$extension_upload;
									$lieu = "image/{$nm}";
									$resultat = move_uploaded_file($_SESSION['file_data']['file-input']['tmp_name'], $lieu);
									if ($resultat){
										$photo=$nm;
									}

									$query = $bdd->prepare('SELECT * FROM kh_city WHERE nom_city = ?');
									$query->execute(array($_SESSION['post_data']['ville']));
									$rep = $query->fetchAll();
									foreach ($rep as $reponse) {
										$city = $reponse['id_city'];
									}

									$query = $bdd->prepare('SELECT * FROM kh_kwata WHERE nom_kwata = ?');
									$query->execute(array($_SESSION['post_data']['kwata']));
									$rep = $query->fetchAll();
									foreach ($rep as $reponse) {
										$kwata = $reponse['id_kwata'];
									}

									$query = $bdd->prepare('SELECT * FROM kh_secto WHERE nom_secto = ?');
									$query->execute(array($_SESSION['post_data']['secto']));
									$rep = $query->fetchAll();
									foreach ($rep as $reponse) {
										$secto = $reponse['id_secto'];
									}

									$query = $bdd->prepare('SELECT * FROM kh_metier WHERE nom_metier = ?');
									$query->execute(array($_SESSION['post_data']['job']));
									$rep = $query->fetchAll();
									foreach ($rep as $reponse) {
										$job = $reponse['id_metier'];
									}

									$audi = split(' ', $_SESSION['post_data']['budget'])[0];
									$date1 = $_SESSION['post_data']['date1'];
									$date2 = $_SESSION['post_data']['date2'];

									if (strlen($_SESSION['post_data']['url']) == 0) {
										$_SESSION['post_data']['url'] = null;
									}
									
									if(!empty($_SESSION['post_data']['text'])){
										$req = $bdd ->prepare('INSERT INTO kh_pub (text_pub, img_pub, id_kh_ville_fk, id_kh_kwata_fk, id_kh_secto_fk, id_kh_metier_fk, prix, date_deb, date_fin, audience, id_kh_user_fk, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
										if($req ->execute(array($_SESSION['post_data']['text'], $photo, $city, $kwata, $secto, $job, $audi*10, $date1, $date2, $audi, $user, $_SESSION['post_data']['url']))){
											//header('Location:index.php');
											echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Votre pub a ete enregistree avec succes... veuillez patienter quelques jours pour confirmation</div>';
										}
									}else{
										$req = $bdd->prepare('INSERT INTO kh_pub (img_pub, id_kh_ville_fk, id_kh_kwata_fk, id_kh_secto_fk, id_kh_metier_fk, prix, date_deb, date_fin, audience, id_kh_user_fk, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
										if($req->execute(array($photo, $city, $kwata, $secto, $job, $audi*10, $date1, $date2, $audi, $user, $_SESSION['post_data']['url']))){
											//header('Location:index.php');
											echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Votre pub a ete enregistree avec succes... veuillez patienter quelques jours pour confirmation</div>';
										}
									}									
								}
							}else{
								echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button><strong>Warning!</strong> Choisissez une image de 640*480 ou 2000*2000</div>';
							}
						}					
					}
				}
			}
		}
	}	

	function filter($file){

	    $img=getimagesize($file['tmp_name']);
	    $minimum = array('width' => '640', 'height' => '480');
	    $maximum = array('width' => '2000', 'height' => '2000');
	    $width= $img[0];
	    $height =$img[1];

	    if ($width > $minimum['width'] && $width < $maximum['width']){
	        if ($height > $minimum['height'] && $height < $maximum['height']){
		        return true;
		    }else{
		    	return false;
		    }
	    }else{
	    	return false;
	    }	    
	}
?>