<?php 

function pdo_connex ( $db_name, $db_user = "root" , $db_pass = "" , $db_host = "localhost"){
$dsn='mysql:host='.$db_host.';dbname='.$db_name;
 $con=null;
 try {
 	$con = new PDO($dsn,$db_user,$db_pass);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
 	echo "connexion echouée : ".$e->getMessage();
 }
 return $con;
}

 ?>
