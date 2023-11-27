<?php
include '../model/menu.model.php';
$menu = getAll();
while ($m = $menu->fetch()) {
	var_dump($m);
}
