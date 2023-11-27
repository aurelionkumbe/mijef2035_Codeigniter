<?php
	require_once("aut/bdconnect.php"); 
	$tabreg = array();
	$tabcity = array();
	$tabkwata = array();
	$tabserv = array();
	$tabjob = array();
	$tabsecto = array();
		$reponse = $bdd ->query("SELECT * FROM kh_reg ORDER BY nom_reg ASC");				
		while ($donnees = $reponse ->fetch())
			{				  
				$tabreg[] = 
						array(
							'iddep' => $donnees["id_reg"],
							'Nom' => $donnees["nom_reg"]

						);
			}
		$reponse->closeCursor();		
		$nb = count($tabreg);

		$repnse = $bdd ->query("SELECT * FROM kh_city ORDER BY nom_city ASC");				
		while ($donees = $repnse ->fetch())
			{				  
				$tabcity[] = 
						array(
							'iddep' => $donees["id_city"],
							'Nom' => $donees["nom_city"]

						);
			}
		$repnse->closeCursor();		
		$nbr = count($tabcity);

		$rponse = $bdd ->query("SELECT * FROM kh_kwata ORDER BY nom_kwata ASC");				
		while ($dones = $rponse ->fetch())
			{				  
				$tabkwata[] = 
						array(
							'iddep' => $dones["id_kwata"],
							'Nom' => $dones["nom_kwata"]

						);
			}
		$rponse->closeCursor();		
		$nbre = count($tabkwata);

		$rpnse = $bdd ->query("SELECT * FROM kh_secto ORDER BY nom_secto ASC");				
		while ($dons = $rpnse ->fetch())
			{				  
				$tabsecto[] = 
						array(
							'iddep' => $dons["id_secto"],
							'Nom' => $dons["nom_secto"]

						);
			}
		$rpnse->closeCursor();		
		$br = count($tabsecto);

		$rpse = $bdd ->query("SELECT * FROM kh_services ORDER BY libelle ASC");				
		while ($don = $rpse ->fetch())
			{				  
				$tabserv[] = 
						array(
							'iddep' => $don["id_service"],
							'Nom' => $don["libelle"]

						);
			}
		$rpse->closeCursor();		
		$bre = count($tabserv);

		$rps = $bdd ->query("SELECT * FROM kh_metier ORDER BY nom_metier ASC");				
		while ($dos = $rps ->fetch())
			{				  
				$tabjob[] = 
						array(
							'iddep' => $dos["id_metier"],
							'Nom' => $dos["nom_metier"]

						);
			}
		$rps->closeCursor();		
		$bre = count($tabserv);

?>