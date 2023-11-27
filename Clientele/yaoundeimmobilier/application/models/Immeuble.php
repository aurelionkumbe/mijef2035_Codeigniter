<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Immeuble extends CI_Model {





        public function getIntance()
        {
                return $this;
        }



    public function getDatas()
    {
        return $this->db->query("SELECT *, C.ID AS ID, T.Libelle AS Type FROM Construction C JOIN  Type T ON C.TypeID = T.ID WHERE T.Libelle like 'immeuble%' ORDER BY C.id DESC ")->result_array();
        //       return $this->datas;
    }

    public function getOne($id)
    {

        return $this->db->query("SELECT *, C.ID AS ID, T.Libelle AS Type FROM Construction C JOIN  Type T ON C.TypeID = T.ID WHERE (T.Libelle like 'immeuble%') AND C.ID = ?", compact('id'))->row_array();
        //       return $this->datas;
    }




}