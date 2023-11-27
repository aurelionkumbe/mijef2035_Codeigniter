<?php

function connect() {
 $conn;
$host = 'localhost'; //hostname;
$username = 'root'; //username;
$password = ''; //password
$db_name = 'bd_izzytpl'; //name of your 
    try{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    }catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage();
    }

    return $conn;
}	
	
