<?php

/**
 * Created by PhpStorm.
 * User: Aurelio Nkumbe
 * Date: 15/12/2015
 * Time: 15:23
 */
class electeur_model extends CI_Model
{

    public function get_all(){
        $res = $this->db->get('electeur')->result_array();
       return $res;
    }


    public function count_all(){
        $res = $this->db->get('electeur')->result_array();
        return count($res);
    }

    public function count_votant(){
        $res = $this->db->where('dejaVote' , 1)->get('electeur')->result_array();
        return count($res);
    }


}