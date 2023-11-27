<?php

/**
 * Created by PhpStorm.
 * User: Aurelio Nkumbe
 * Date: 15/12/2015
 * Time: 15:23
 */
class candidat_model extends CI_Model
{

    public function get_all(){
        return $this->db->get('candidat')->result_array();
    }

    public function winner(){

        $nbreVoie = $this->db->select_max('nbreVoie' , 'val')->get('candidat')->result_array();
        $nbreVoie = $nbreVoie[0]['val'];
        return $this->db->where('nbreVoie' , $nbreVoie )->get('candidat')->result_array();
    }

    public function get_SVE(){
        $res = $this->db->select_sum('nbreVoie')->get('candidat')->result_array();
        return $res[0]['nbreVoie'];
    }

    public function get_membre(){
        return $this->db->get('bureau')->result_array();
    }

    public function truncature(){
        $candi = $this->get_all();
        if($candi[0]['nbreVoie'] > 20 || $candi[1]['nbreVoie'] > 20){
            while( $candi[0]['nbreVoie'] < $candi[1]['nbreVoie'] + 4 ){
                $candi[0]['nbreVoie']++;
                $candi[1]['nbreVoie']--;
            }
            /*
            echo '<pre>';
            var_dump($candi);
            echo '</pre>';
            */
            $this->db->where('id' , $candi[0]['id'])->update('candidat' , array(
                'nbreVoie' => $candi[0]['nbreVoie'],
            ));
            $this->db->where('id' , $candi[1]['id'])->update('candidat' , array(
                'nbreVoie' => $candi[1]['nbreVoie'],
            ));
        }

        return $this->db->get('bureau')->result_array();
    }


}