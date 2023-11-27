<?php		
			session_start();
			if(empty($_SESSION['idadmin']))
				header('Location: index.php');
			else
				if($_SESSION['valid']==0)
					header('Location: index.php');
?>