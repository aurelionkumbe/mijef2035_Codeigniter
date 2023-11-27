<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends NEAA_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

    	redirect(site_url('books'));
	}


	public function help()
	{
		
		if(ENVIRONMENT === "development"){
			redirect(base_url().'../user_guide');
		}else{
			$this->load('welcome_message');	
		}
		
		
	}
}
