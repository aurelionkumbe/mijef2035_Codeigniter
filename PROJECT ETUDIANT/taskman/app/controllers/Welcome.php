<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'app/helpers/Utils.php';
//echo \NEAA\Utils::hash_mdp('1234'); die;

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if (session_status() != PHP_SESSION_ACTIVE) {
		    session_start();
		}

	}

	public function index()
	{

		//$secret = \NEAA\Utils::hash_mdp("123456");
		//var_dump($secret ); die

		if (isset($_POST['login'])) {
			unset($_POST['login']);			

			$result = $this->db->get_where('personnes', ['tel_pers' => $_POST['telephone'], 'pass'=> \NEAA\Utils::hash_mdp($_POST['pass'])], 1)->result_object();

			//var_dump($result); die;
			if(!empty($result)){
				$_SESSION['user'] = $result[0];
				$_SESSION['is_logged_in'] = 1;
				redirect(site_url('user'));

			}
		}
               
            //$this->template('index');
           $this->load->view('index');
		//$this->load->view('index');
	}

	
}
