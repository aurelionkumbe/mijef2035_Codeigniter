<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Electeur extends CI_Controller {

	public function index()
	{
		$this->load->view('home' , array(
			'activeMenu' => 'home',
		));
	}

	public function login()
	{
		$this->load->view('electeur_login' , array(
			'activeMenu' => 'vote',
		));
	}

}
