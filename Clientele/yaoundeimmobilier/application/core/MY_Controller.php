<?php

/**
 * Created by PhpStorm.
 * User: nkaurelien
 * Date: 11/06/17
 * Time: 09:39
 */
class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function dump($var){
        echo '<pre>';
        var_dump($var); die('</pre>');
    }

    function compteur(){
        $compteur = file_get_contents(APPPATH.'third_party/compteur');
        $compteur += 1;
        file_put_contents(APPPATH.'third_party/compteur', $compteur);
        echo ($compteur);
        die();
    }
}