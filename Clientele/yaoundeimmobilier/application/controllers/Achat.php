<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achat extends CI_Controller {

    private $page ="achats";
	private $choix;
	private $id;

	public function __construct()
	
	{
			parent::__construct();

		$this->choix = isset ($_GET['choix']) && $_GET['choix'] != "" && in_array($_GET['choix'], ['terrain', 'maison'])
		? $_GET['choix'] : 'maison';
		$this->id = isset ($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id'])
		? $_GET['id'] : 'maison';

		$this->load->model(ucfirst($this->choix), 'dao');	

	}


	public function index()
	{

        $this->load->view('achats' , array('page' => $this->page, "datas" => $this->dao->getDatas(), "choix" => $this->choix));						

	}

	public function detail()
	{	

		$data = null;
		
		foreach ($this->dao->getDatas() as $el) {
			if ($el['id'] = $this->id) {
				$data = $el;
				//var_dump($data); die;
				break;
			}
		}
	
        $this->load->view('achats' , array('page' => $this->page, "data" => $data, "choix" => $this->choix));						
	}

}
