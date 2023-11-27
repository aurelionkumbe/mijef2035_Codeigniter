<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studio extends CI_Model {


        private $datas = [
		[
			"id"=>1,
			"cover" => "appart.png",
			"photos" => ["appart1.png", "appart2.png", "appart3.png", "appart4.png","appart5.png","appart6.png"],
			"label" => "",
			"desc" => "4 pieces, 2 chambres, 1 sallons",
			"prix" => "20 000",
			"quartier" => "Mvog bi",
			"ville" => "Yaoundé",
			"type" => "Moderne",
		],
		[
			"id"=>2,
			"cover" => "appart.png",
			"photos" => ["appart1.png", "appart2.png", "appart3.png", "appart4.png","appart5.png","appart6.png"],
			"label" => "",
			"desc" => "4 pieces, 2 chambres, 1 sallons",
			"prix" => "2 000 000",
			"quartier" => "Ekié",
			"ville" => "Yaoundé",
			"type" => "Moderne",
		],
		[
			"id"=>3,
			"cover" => "appart.png",
			"photos" => ["appart1.png", "appart2.png", "appart3.png", "appart4.png","appart5.png","appart6.png"],
			"label" => "",
			"desc" => "4 pieces, 2 chambres, 1 sallons",
			"prix" => "20 000",
			"quartier" => "Ekounou",
			"ville" => "Yaoundé",
			"type" => "Moderne",
		],
		[
			"id"=>4,
			"cover" => "appart.png",
			"photos" => ["appart1.png", "appart2.png", "appart3.png", "appart4.png","appart5.png","appart6.png"],
			"label" => "",
			"desc" => "4 pieces, 2 chambres, 1 sallons",
			"prix" => "20 000",
			"quartier" => "Ekounou",
			"ville" => "Yaoundé",
			"type" => "Moderne",
		],
		
	];

        public function __construct()
        {
                parent::__construct();
        }



        public function getIntance()
        {
                return $this;
        }



    public function getDatas()
    {
        return $this->db->query("SELECT *, C.ID AS ID, T.Libelle AS Type FROM Construction C JOIN  Type T ON C.TypeID = T.ID WHERE T.Libelle like 'studio%' ORDER BY C.id DESC ")->result_array();
        //       return $this->datas;
    }

    public function getOne($id)
    {

        return $this->db->query("SELECT *, C.ID AS ID, T.Libelle AS Type FROM Construction C JOIN  Type T ON C.TypeID = T.ID WHERE (T.Libelle like 'studio%') AND C.ID = ?", compact('id'))->row_array();
        //       return $this->datas;
    }




}