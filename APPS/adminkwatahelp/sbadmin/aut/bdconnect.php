<?php
// 			$settings = "";
// $link = "../classe/settings.ini.php";
// 		if (file_exists($link)) {
// 			$settings = parse_ini_file($link);
// 		}else{
// 	        $settings = parse_ini_file('../'.$link);
// 		}

	$bdname = "kwatahelyfdigit";
	$bdhost = "kwatahelyfdigit.mysql.db";
	$bdpass = "Vpl21iB201qu";
        $dsn = 'mysql:dbname=' . $bdname . ';host=' . $bdhost . '';
        //var_dump($settings);die();
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd= new PDO($dsn, $bdname, $bdpass, $pdo_options);

			//$bdd=new pdo('mysql:host=localhost;dbname=kwatahelp','root','',$pdo_options);
			$bdd->exec("SET CHARACTER SET utf8");
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
?>