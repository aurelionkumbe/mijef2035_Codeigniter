<?php

include('../config/db.class.php'); // call db.class.php


	function getAll()
	{
		$con = connect();
		$query = "SELECT * FROM menu";
		$stmt = $con->prepare($query); 
		return $stmt->execute();

	}
