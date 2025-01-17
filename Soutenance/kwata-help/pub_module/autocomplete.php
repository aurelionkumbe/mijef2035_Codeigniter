<?php 
	require_once('aut/bdconnect.php');

	if (isset($_POST['name'])) {
		if (!empty($_POST['name'])) {
			
			if($_POST['name'] == 'ville'){
				$query = $bdd->prepare('SELECT * FROM kh_city WHERE nom_city LIKE ? AND statut = 1 ORDER BY nom_city ASC');
				$query->execute(array('%'.$_POST['ville'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_city = str_replace($_POST['ville'], '<b>'.$_POST['ville'].'</b>', $r['nom_city']);
					echo '<li onclick="choose(\''.$r['nom_city'].'\', 1)">'.$nom_city.'</li>';
				}
			}

			if($_POST['name'] == 'metier'){
				$query = $bdd->prepare('SELECT * FROM kh_metier WHERE nom_metier LIKE ? AND statut = 1 ORDER BY nom_metier ASC');
				$query->execute(array('%'.$_POST['job'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_metier = str_replace($_POST['job'], '<b>'.$_POST['job'].'</b>', $r['nom_metier']);
					echo '<li onclick="choose(\''.$r['nom_metier'].'\', 2)">'.$nom_metier.'</li>';
				}
			}

			if($_POST['name'] == 'secto'){				
				$query = $bdd->prepare('SELECT * FROM kh_secto WHERE nom_secto LIKE ? AND statut = 1 ORDER BY nom_secto ASC');
				$query->execute(array('%'.$_POST['secto'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_secto = str_replace($_POST['secto'], '<b>'.$_POST['secto'].'</b>', $r['nom_secto']);
					echo '<li onclick="choose(\''.$r['nom_secto'].'\', 3)">'.$nom_secto.'</li>';
				}														
			}

			if($_POST['name'] == 'kwata'){				
				$query = $bdd->prepare('SELECT * FROM kh_kwata WHERE nom_kwata LIKE ? AND statut = 1 ORDER BY nom_kwata ASC');
				$query->execute(array('%'.$_POST['kwata'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_kwata = str_replace($_POST['kwata'], '<b>'.$_POST['kwata'].'</b>', $r['nom_kwata']);
					echo '<li onclick="choose(\''.$r['nom_kwata'].'\', 4)">'.$nom_kwata.'</li>';
				}
			}
		}		
	}
?>