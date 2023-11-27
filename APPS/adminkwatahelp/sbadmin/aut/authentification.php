<?php	
	
	require_once("bdconnect.php");
	//var_dump($_POST);die();
	if(!empty($_POST['login'])||!empty($_POST['password']))
	   {    
			$reponse = $bdd ->prepare('SELECT * FROM kh_admin WHERE login_admin=? AND pass_admin=? AND valid_admin != 0');
			$reponse ->execute(array($_POST['login'], $_POST['password']));
			$nb = $reponse->rowCount();
			
			if ($nb==0)
				{
					//echo 'Entrez un login et un mot de passe correctes !!!<br> Sinon contactez l\'administrateur !!!';
					header('Location: ../index.php');
				}
			else
				{			
					$reponse = $bdd ->prepare('SELECT * FROM kh_admin WHERE login_admin=? AND pass_admin=?');
					$reponse ->execute(array($_POST['login'], $_POST['password']));
					while ($donnees = $reponse ->fetch())
					   {				  
							$idpers = $donnees['id_admin'];
							$nom = $donnees['nom_admin'];
							$pass = $donnees['acces_admin'];
							$val = $donnees['valid_admin'];
								 session_start();
										$_SESSION['idadmin'] = $idpers;
										$_SESSION['nom'] = $nom;
										$_SESSION['pass'] = $pass;
										$_SESSION['valid'] = $val;
							header('Location: ../accueil.php');
						}
					$reponse->closeCursor();
			    }
	   }
	else
		{
			//echo 'Les champs sont vides; entrez un login et un mot de passe !!!';
			header('Location: ../index.php');
		}
?>
