<?php 
	require_once('aut/bdconnect.php');

	if (isset($_POST['name'])) {
		if (!empty($_POST['name'])) {
			
			if($_POST['name'] == 'ville_ins'){
				$query = $bdd->prepare('SELECT * FROM kh_city WHERE nom_city LIKE ? AND statut = 1 ORDER BY nom_city ASC');
				$query->execute(array('%'.$_POST['villes'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_city = str_replace($_POST['villes'], '<b>'.$_POST['villes'].'</b>', $r['nom_city']);
					echo '<li onclick="chooses(\''.$r['nom_city'].'\', 1)">'.$nom_city.'</li>';
				}
			}

			if($_POST['name'] == 'metier_ins'){
				$query = $bdd->prepare('SELECT * FROM kh_metier WHERE nom_metier LIKE ? AND statut = 1 ORDER BY nom_metier ASC');
				$query->execute(array('%'.$_POST['job'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_metier = str_replace($_POST['job'], '<b>'.$_POST['job'].'</b>', $r['nom_metier']);
					echo '<li onclick="chooses(\''.$r['nom_metier'].'\', 2)">'.$nom_metier.'</li>';
				}
			}

			if($_POST['name'] == 'secto_ins'){
				$query = $bdd->prepare('SELECT * FROM kh_secto WHERE nom_secto LIKE ? AND statut = 1 ORDER BY nom_secto ASC');
				$query->execute(array('%'.$_POST['sectos'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_secto = str_replace($_POST['sectos'], '<b>'.$_POST['sectos'].'</b>', $r['nom_secto']);
					echo '<li onclick="chooses(\''.$r['nom_secto'].'\', 3)">'.$nom_secto.'</li>';
				}														
			}

			if($_POST['name'] == 'kwata_ins'){				
				$query = $bdd->prepare('SELECT * FROM kh_kwata WHERE nom_kwata LIKE ? AND statut = 1 ORDER BY nom_kwata ASC');
				$query->execute(array('%'.$_POST['kwatas'].'%'));
				$rpse = $query->fetchAll();
				foreach ($rpse as $r) {
					$nom_kwata = str_replace($_POST['kwatas'], '<b>'.$_POST['kwatas'].'</b>', $r['nom_kwata']);
					echo '<li onclick="chooses(\''.$r['nom_kwata'].'\', 4)">'.$nom_kwata.'</li>';
				}
			}
		}		
	}
?>