<?php 
	require_once('../sbadmin/aut/bdconnect.php');

	$sql = 'SELECT * FROM kh_pub WHERE date_fin < ?';
	$query = $bdd->prepare($sql);
	$query->execute(array(NOW()));
	$reponse = $query->fetchAll();

	foreach ($reponse as $rep){		
		$sql = 'DELETE FROM kh_pub WHERE id_pub = ?';
		$query = $bdd->prepare($sql);
		if($query->execute(array($rep['id_pub']))){
			unlink('image/'.$rep['img_pub']);	
		}		
	}
?>