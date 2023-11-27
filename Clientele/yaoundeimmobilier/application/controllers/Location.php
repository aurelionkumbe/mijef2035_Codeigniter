<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller {

    private $page ="locations";
	private $choix;
	private $id;

	public function __construct()
	
	{
			parent::__construct();

		$this->choix = isset ($_GET['choix']) && $_GET['choix'] != "" && in_array($_GET['choix'], ['appart', 'maison', 'studio', 'bureau','magasin','immeuble', 'autre'])
		? $_GET['choix'] : 'appart';
		$this->id = isset ($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id'])
		? $_GET['id'] : 'appart';

		$this->load->model(ucfirst($this->choix), 'dao');	

	}


	public function index()
	{

        $datas =  $this->dao->getDatas();

        //$this->dump($datas);
        $this->load->view('locations' , array('page' => $this->page, "datas" => $this->dao->getDatas(), "choix" => $this->choix));

	}

	public function detail()
	{	

		$data = $this->dao->getOne($this->id);

		
/*		foreach ($this->dao->getDatas() as $el) {
			if ($el['id'] = $this->id) {
				$data = $el;
				//var_dump($data); die;
				break;
			}
		}
*/
        $this->load->view('locations' , array('page' => $this->page, "data" => $data, "choix" => $this->choix));						
	}

}
