<?php
	require_once("aut/bdconnect.php");
	//var_dump($_FILES);die();
	if($_POST['modif']=='admin')
		{
			if(!empty($_POST['nom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_admin set nom_admin = :stat WHERE id_admin = :id_art");
					$query->bindParam(":stat", $_POST['nom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Nom modifié !!!';
				}
			if(!empty($_POST['login']))
				{ 
					$query = $bdd->prepare("UPDATE kh_admin set login_admin = :stat WHERE id_admin = :id_art");
					$query->bindParam(":stat", $_POST['login']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Login modifié !!!';
				}
			if(!empty($_POST['pass']))
				{ 
					$query = $bdd->prepare("UPDATE kh_admin set pass_admin = :stat WHERE id_admin = :id_art");
					$query->bindParam(":stat", $_POST['pass']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Mot de passe modifié !!!';
				}
			if(!empty($_POST['dac']))
				{ 
					$query = $bdd->prepare("UPDATE kh_admin set acces_admin = :stat WHERE id_admin = :id_art");
					$query->bindParam(":stat", $_POST['dac']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Droit d\'accès modifié !!!';
				}
			
		}
		
	if($_POST['modif']=='user')
		{
			if(!empty($_POST['nom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set nom_user= :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['nom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Nom modifié !!!';
				}
			if(!empty($_POST['pnom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set prenom = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['pnom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Prénom modifié !!!';
				}
			if(!empty($_POST['pseudo']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set pseudo = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['pseudo']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Pseudonyme modifié !!!';
				}
			if(!empty($_POST['mail']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set email= :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['mail']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Email modifié !!!';
				}
			if(!empty($_POST['tel']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set telephone = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['tel']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Téléphone modifié !!!';
				}
			if(!empty($_POST['tuser']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set type_user = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['tuser']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Type d\' utilisation modifié !!!';
				}
			if(!empty($_POST['tcompte']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set type_compte = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['tcompte']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Type de compte modifié !!!';
				}
			if(!empty($_POST['kwata']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set kh_kwata_id = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['kwata']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Kwata modifié !!!';
				}
			if(!empty($_POST['secto']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set kh_secto_id = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['secto']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Secto modifié !!!';
				}
			if(!empty($_POST['job']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set kh_metier_id = :stat WHERE id_user = :id_art");
					$query->bindParam(":stat", $_POST['job']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Metier modifié !!!';
				}
			if(!empty($_POST['pass']))
				{ 
					$query = $bdd->prepare("UPDATE kh_user set password = :stat WHERE id_admin = :id_art");
					$query->bindParam(":stat", $_POST['pass']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Mot de passe modifié !!!';
				}
			
		}
		
	if($_POST['modif']=='catgal')
		{
			if(!empty($_POST['titre']))
				{ 
					$query = $bdd->prepare("UPDATE kh_cat_galerie set nom_cat = :stat WHERE id_catgalerie = :id_art");
					$query->bindParam(":stat", $_POST['titre']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Catégorie photo modifiée !!!';
				}
		}

	if($_POST['modif']=='job')
		{
			if(!empty($_POST['nom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_metier set nom_metier = :stat WHERE id_metier = :id_art");
					$query->bindParam(":stat", $_POST['nom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Nom modifié !!!';
				}
			if(!empty($_POST['serv']))
				{ 
					$query = $bdd->prepare("UPDATE kh_metier set kh_services_id = :stat WHERE id_metier = :id_art");
					$query->bindParam(":stat", $_POST['serv']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Type de service modifié !!!';
				}
			
		}

	if($_POST['modif']=='kwata')
		{
			if(!empty($_POST['nom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_kwata set nom_kwata = :stat WHERE id_kwata = :id_art");
					$query->bindParam(":stat", $_POST['nom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Nom modifié !!!';
				}
			if(!empty($_POST['city']))
				{ 
					$query = $bdd->prepare("UPDATE kh_kwata set kh_city_id = :stat WHERE id_kwata = :id_art");
					$query->bindParam(":stat", $_POST['city']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Ville modifié !!!';
				}
			
		}

	if($_POST['modif']=='secto')
		{
			if(!empty($_POST['nom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_secto set nom_secto = :stat WHERE id_secto = :id_art");
					$query->bindParam(":stat", $_POST['nom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Nom modifié !!!';
				}
			if(!empty($_POST['kwata']))
				{ 
					$query = $bdd->prepare("UPDATE kh_secto set kh_kwata_id = :stat WHERE id_secto = :id_art");
					$query->bindParam(":stat", $_POST['kwata']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Kwata modifié !!!';
				}
			
		}

	if($_POST['modif']=='city')
		{
			if(!empty($_POST['nom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_city set nom_city = :stat WHERE id_city = :id_art");
					$query->bindParam(":stat", $_POST['nom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Nom modifié !!!';
				}
			if(!empty($_POST['arrond']))
				{ 
					$query = $bdd->prepare("UPDATE kh_city set kh_reg_id = :stat WHERE id_city = :id_art");
					$query->bindParam(":stat", $_POST['arrond']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Région modifié !!!';
				}
			
		}

	if($_POST['modif']=='serv')
		{
			if(!empty($_POST['nom']))
				{ 
					$query = $bdd->prepare("UPDATE kh_services set libelle = :stat WHERE id_service = :id_art");
					$query->bindParam(":stat", $_POST['nom']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Libelle modifié !!!';
				}
		}
		
	if($_POST['modif']=='photo')
		{
			if(!empty($_POST['titre']))
				{ 
					$query = $bdd->prepare("UPDATE kh_galerie set titre = :stat WHERE id_galerie = :id_art");
					$query->bindParam(":stat", $_POST['titre']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Titre modifié !!!';
				}
				
			if(!empty($_POST['texte']))
				{ 
					$query = $bdd->prepare("UPDATE kh_galerie set texte = :stat WHERE id_galerie = :id_art");
					$query->bindParam(":stat", $_POST['texte']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Texte modifié !!!';
				}
				
			if(!empty($_POST['lien']))
				{ 
					$query = $bdd->prepare("UPDATE kh_galerie set id_catgal = :stat WHERE id_galerie = :id_art");
					$query->bindParam(":stat", $_POST['lien']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Catégorie photo modifiée !!!';
				}
			
			if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
				{
					if ($_FILES['photo']['size'] <= 6500000)
						{
							$infosfichier = pathinfo($_FILES['photo']['name']);
							$extension_upload = $infosfichier['extension'];
							$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
							if (in_array($extension_upload, $extensions_autorisees))
							{
							$dat = date('mYHis');		
							$nm = 'gale'.$dat.'.'.$extension_upload;
									$lieu = "../img/galerie/{$nm}";		
									$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$lieu);
									if ($resultat)
										$photo=$nm;						 
							}					  
						}
					
					$query = $bdd->prepare("UPDATE kh_galerie  set image = :stat WHERE id_infp = :id_art");
					$query->bindParam(":stat", $photo);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Photo modifié !!!';
				}
		}
		
	if($_POST['modif']=='vedette')
		{
			if(!empty($_POST['titre']))
				{ 
					$query = $bdd->prepare("UPDATE kh_vedette set titre = :stat WHERE id_vedette = :id_art");
					$query->bindParam(":stat", $_POST['titre']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Titre modifié !!!';
				}
				
			if(!empty($_POST['texte']))
				{ 
					$query = $bdd->prepare("UPDATE kh_vedette set texte = :stat WHERE id_vedette = :id_art");
					$query->bindParam(":stat", $_POST['texte']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Texte modifié !!!';
				}
				
			if(!empty($_POST['lien']))
				{ 
					$query = $bdd->prepare("UPDATE kh_vedette set lien_article = :stat WHERE id_vedette = :id_art");
					$query->bindParam(":stat", $_POST['lien']);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Articlé lié modifié !!!';
				}
			
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
			
					$query = $bdd->prepare("UPDATE kh_vedette set image = :stat WHERE id_vedette = :id_art");
					$query->bindParam(":stat", $image);
					$query->bindParam(":id_art", $_POST['id_obj']);
					$query->execute();			
						
					echo 'Image modifié !!!';
				}
		}
?>