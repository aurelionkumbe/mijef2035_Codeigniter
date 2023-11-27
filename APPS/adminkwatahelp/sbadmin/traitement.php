<?php
	require_once("aut/bdconnect.php");
			
	if($_POST['type']=='user')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_user WHERE id_user = :id");
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Utilisateur supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_user WHERE id_user = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_user set statut = :stat WHERE id_user = :id");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Utilisateur modifié !!!';
				}
			
		}

	if($_POST['type']=='kwata')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_kwata WHERE id_kwata = :id");
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Kwata supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_kwata WHERE id_kwata = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_kwata set statut = :stat WHERE id_kwata = :id");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Kwata modifié !!!';
				}
			
		}

	if($_POST['type']=='secto')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_secto WHERE id_secto = :id");
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Secto supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_secto WHERE id_secto = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_secto set statut = :stat WHERE id_secto = :id");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Secto modifié !!!';
				}
			
		}

	if($_POST['type']=='serv')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_services WHERE id_service = :id");
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Type de service supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_services WHERE id_service = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_services set statut = :stat WHERE id_service = :id");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Type de service modifié !!!';
				}
			
		}

	if($_POST['type']=='job')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_metier WHERE id_metier = :id");
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo ' Metier supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_metier WHERE id_metier = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_metier set statut = :stat WHERE id_metier = :id");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Metier modifié !!!';
				}
			
		}

	if($_POST['type']=='city')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_city WHERE id_city = :id");
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Ville supprimée !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_city WHERE id_city = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_city set statut = :stat WHERE id_city = :id");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Ville modifiée !!!';
				}
			
		}

	if($_POST['type']=='admin')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_admin WHERE id_admin = :id");
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Administrateur supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT valid_admin FROM kh_admin WHERE id_admin = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['valid_admin'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_admin set valid_admin = :stat WHERE id_admin = :id");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id", $id);
					$query->execute();			
						
					echo 'Administrateur modifié !!!';
				}
			
		}
		
	if($_POST['type']=='catgal')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_cat_galerie WHERE id_catgalerie = :id_art");
					$query->bindParam(":id_art", $id);
					$query->execute();			
						
					echo 'Catégorie de photo supprimée !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_cat_galerie WHERE id_catgalerie = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_cat_galerie set statut = :stat WHERE id_catgalerie = :id_art");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id_art", $id);
					$query->execute();			
						
					echo 'Statut modifié !!!';
				}
			
		}
		
	if($_POST['type']=='photo')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_galerie WHERE id_galerie = :id_art");
					$query->bindParam(":id_art", $id);
					$query->execute();			
						
					echo 'Photo supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_galerie WHERE id_galerie = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_galerie set statut = :stat WHERE id_galerie = :id_art");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id_art", $id);
					$query->execute();			
						
					echo 'Statut modifié !!!';
				}
			
		}
		
	if($_POST['type']=='vedette')
		{ 
			$id = $_POST['idart'];
			if($_POST['mod'] == 'sup')
				{
					$query = $bdd->prepare("DELETE FROM kh_vedette WHERE id_vedette = :id_art");
					$query->bindParam(":id_art", $id);
					$query->execute();			
						
					echo 'Photo supprimé !!!';
				}
			if($_POST['mod'] == 'pub')
				{
					$stat = 0;
					$req = $bdd ->prepare('SELECT statut FROM kh_vedette WHERE id_vedette = ?');
					$req ->execute(array($id));
					while ($donees = $req ->fetch())
						   {				  
								$stat = $donees['statut'];
							}
						$req->closeCursor();
						
						if($stat == 0){ $sta = 1;}
						else { $sta = 0;}
					
					$query = $bdd->prepare("UPDATE kh_vedette set statut = :stat WHERE id_vedette = :id_art");
					$query->bindParam(":stat", $sta);
					$query->bindParam(":id_art", $id);
					$query->execute();			
						
					echo 'Statut modifié !!!';
				}
			
		}
?>