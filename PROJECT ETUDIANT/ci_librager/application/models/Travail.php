<?php

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 23/03/16
 * Time: 18:34
 */
include_once '../libs/PDO/Db.class.php';

class Travail extends NEAA_Model
{
    public $table = travail;

    public function __construct()
    {
        parent::__construct();
        $this->load();

    }

    public function insert($data){

    }

    public function delete($data){

    }

    public function get_all_inititule($data){

    }
    public function get_all($data){

    } 
}