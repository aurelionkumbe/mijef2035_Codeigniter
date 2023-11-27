<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    private  $page ="accueil";

	public function index()
	{
	    $this->page = "accueil";


        $this->load->view('index', array('page' => $this->page));
	}


}
