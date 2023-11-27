<?php

require_once("easyCRUD.class.php");

class Auth Extends Crud {

    private $db;

    public function __construct($db) {
        $this->db = new Db();
    }

    public function enreg($login, $password, $email) {
        $this->db->query("INSERT INTO user SET username = ?, password = ?, email = ?", [
            $login,
            $password,
            $email
        ]);
    }

}

?>