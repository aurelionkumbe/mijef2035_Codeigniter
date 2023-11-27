<?php
	require_once("aut/bdconnect.php");
	
	if($_POST['enreg']=='user')
		{
			if(!empty($_POST['pseudo'])){
				$nom="";
				$pnom="";
				if(!empty($_POST['nom'])){
					$nom=$_POST['nom'];
				}
				if(!empty($_POST['pnom'])){
					$pnom=$_POST['pnom'];
				}
				$uniq = $bdd ->prepare('SELECT * FROM kh_user WHERE nom_user = ? AND prenom = ? AND pseudo = ? AND kh_kwata_id = ? AND telephone = ?');
				$uniq->execute(array($nom, $pnom, $_POST['pseudo'], $_POST['kwat'], $_POST['tel']));
				$test=$uniq->rowCount();
				
				if($test == 0){
					$req = $bdd ->prepare('INSERT INTO kh_user (nom_user, prenom, pseudo, telephone, email, password, type_user, type_compte, kh_kwata_id, kh_secto_id, kh_metier_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
					$req ->execute(array($_POST['nom'], $_POST['pnom'], $_POST['pseudo'], $_POST['tel'], $_POST['mail'], $_POST['pass'], $_POST['tuser'], $_POST['tcompte'], $_POST['kwat'], $_POST['secto'], $_POST['job']));//recupération des utilisateurs
				
					echo 'Utilisateur enregistré !!!';
					}	
				else{
					echo "Utilisateur existant";
				}			
			}
		}

	if($_POST['enreg']=='kwat')
		{
			if(!empty($_POST['nom'])){
				$uniq = $bdd ->prepare('SELECT * FROM kh_kwata WHERE nom_kwata = ? AND kh_city_id = ?');
				$uniq->execute(array($_POST['nom'], $_POST['vil']));
				$test=$uniq->rowCount();

				if($test == 0){
					$req = $bdd ->prepare('INSERT INTO kh_kwata (nom_kwata, kh_city_id) VALUES(?, ?)');
					$req ->execute(array($_POST['nom'],  $_POST['vil']));//recupération des utilisateurs
				
					echo ' kwata enregistré !!!';
				}
				else{
					echo "Kwata existant";
				}
			}
		}

	if($_POST['enreg']=='city')
		{
			if(!empty($_POST['nom'])){
				$uniq = $bdd ->prepare('SELECT * FROM kh_city WHERE nom_city = ? AND kh_reg_id = ?');
				$uniq->execute(array($_POST['nom'], $_POST['arrond']));
				$test=$uniq->rowCount();
				
				if($test == 0){
					$req = $bdd ->prepare('INSERT INTO kh_city (nom_city, kh_reg_id) VALUES(?, ?)');
					$req ->execute(array($_POST['nom'],  $_POST['arrond']));//recupération des utilisateurs
				
					echo ' City enregistrée !!!';
				}
				else{
					echo 'City existante';
				}
			}
		}

	if($_POST['enreg']=='secto')
		{
			if(!empty($_POST['nom'])){
				$uniq = $bdd ->prepare('SELECT * FROM kh_secto WHERE nom_secto = ? AND kh_kwata_id = ?');
				$uniq->execute(array($_POST['nom'], $_POST['kwat']));
				$test=$uniq->rowCount();
				
				if($test == 0){
					$req = $bdd ->prepare('INSERT INTO kh_secto (nom_secto, kh_kwata_id) VALUES(?, ?)');
					$req ->execute(array($_POST['nom'],  $_POST['kwat']));//recupération des utilisateurs
				
					echo ' Secto enregistré !!!';
				}
				else{
					echo 'Secto existant';
				}
			}
		}

	if($_POST['enreg']=='job')
		{
			if(!empty($_POST['nom'])){
				$uniq = $bdd ->prepare('SELECT * FROM kh_metier WHERE nom_metier = ? AND kh_services_id = ?');
				$uniq->execute(array($_POST['nom'], $_POST['serv']));
				$test=$uniq->rowCount();
				
				if($test == 0){
					$req = $bdd ->prepare('INSERT INTO kh_metier (nom_metier, kh_services_id) VALUES(?, ?)');
					$req ->execute(array($_POST['nom'],  $_POST['serv']));//recupération des utilisateurs
				
					echo ' Job enregistré !!!';
				}
				else{
					echo 'Job existant';
				}
			}
		}
		
	if($_POST['enreg']=='serv')
		{
			if(!empty($_POST['nom'])){
				$uniq = $bdd ->prepare('SELECT * FROM kh_metier WHERE libelle = ?');
				$uniq->execute(array($_POST['nom']));
				$test=$uniq->rowCount();
				
				if($test == 0){
					$req = $bdd ->prepare('INSERT INTO kh_services (libelle) VALUES(?)');
					$req ->execute(array($_POST['nom']));//recupération des utilisateurs
				
					echo 'Type service enregistré !!!';
				}
				else{
					echo 'Type service existant';
				}
			}
		}

	if($_POST['enreg']=='admin')
		{
			$req = $bdd ->prepare('INSERT INTO kh_admin (nom_admin, login_admin, pass_admin, acces_admin, valid_admin) VALUES(?, ?, ?, ?, ?)');
			$req ->execute(array($_POST['nom'], $_POST['login'], $_POST['pass'], $_POST['dac'], $_POST['statut']));
	
			echo 'Administrateur enregistré !!!';
		}

	if($_POST['enreg']=='vedette')
		{
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
				{
					if ($_FILES['image']['size'] <= 6500000)
						{
							$infosfichier = pathinfo($_FILES['image']['name']);
							$extension_upload = $infosfichier['extension'];
							$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
							if (in_array($extension_upload, $extensions_autorisees))
								{
									$dat = date('mYHis');		
									$nm = 'ved'.$dat.'.'.$extension_upload;
										$lieu = "../img/{$nm}";		
										$resultat = move_uploaded_file($_FILES['image']['tmp_name'],$lieu);
										if ($resultat)
											$image=$nm;						 
								}					  
						}
			
							$requete = 'INSERT INTO kh_vedette (image, titre, texte, statut) VALUES(?, ?, ?, ?, ?)';
							$solution = array($image, $_POST['titre'], $_POST['texte'], $_POST['statut']);
						
						$req = $bdd ->prepare($requete);
						$req ->execute($solution);
				
						echo 'En vedette créé !!!';
				}
		}
?>