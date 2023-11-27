<?php

require_once("easyCRUD.class.php");

class Users Extends Crud {
    # Your Table name 

    protected $table = 'kh_user';

    # Primary Key of the Table
    protected $pk = 'id_user';


}

?>