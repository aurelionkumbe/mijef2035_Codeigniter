<?php
$data = json_decode(file_get_contents('php://input'), TRUE);
require 'page.php';
if (isset($data['page'])) {
	$nom = $data['page'];
	$page = new page();
	echo $page->Create($nom);
}
 
?>