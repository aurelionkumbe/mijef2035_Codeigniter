<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magasin extends CI_Model {





        public function getIntance()
        {
                return $this;
        }



    public function getDatas()
    {
        return $this->db->query("SELECT *, C.ID AS ID, T.Libelle AS Type FROM Construction C JOIN  Type T ON C.TypeID = T.ID WHERE T.Libelle like 'magasin%' ORDER BY C.id DESC ")->result_array();
        //       return $this->datas;
    }

    public function getOne($id)
    {

        return $this->db->query("SELECT *, C.ID AS ID, T.Libelle AS Type FROM Construction C JOIN  Type T ON C.TypeID = T.ID WHERE (T.Libelle like 'magasin%') AND C.ID = ?", compact('id'))->row_array();
        //       return $this->datas;
    }




}