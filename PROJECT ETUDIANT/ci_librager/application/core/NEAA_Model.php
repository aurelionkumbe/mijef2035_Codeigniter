<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 01/02/16
 * Time: 19:05
 */
 //TODO AJOUTER COE HELPER AU STARTER KIT include_once '../libs/PDO/Db.class.php';
class NEAA_Model extends CI_Model
{
    public function getAll($table=null, $columns=null, $limit = null , $offset=null){
        if (is_null($columns)) {
            $this->db->limit($limit, $offset);
           return $this->db->get($table)->result_array(); 
        }else {
            $this->db->select($columns);
            $this->db->from($table);
            $this->db->limit($limit, $offset);
            return $this->db->get()->result_array(); 
        }
    }
    public function get_undeleted($table, $columns = null, $limit = null , $offset=null){
        if (is_null($columns)) {
            $this->db->where('deleted', '<> 1');
           return $this->db->get($table)->result_array(); 
        }else {
            $this->db->select($columns);
            $this->db->from($table);
            $this->db->where('deleted', '<> 1');
            $this->db->limit($limit, $offset);
            return $this->db->get()->result_array(); 
        }
    }
    public function get_deleted($table, $columns = null){
        if (is_null($columns)) {
            $this->db->where('deleted', '1');
           return $this->db->get($table)->result_array(); 
        }else {
            $this->db->select($columns);
            $this->db->from($table);
            $this->db->where('deleted', '1');
            return $this->db->get()->result_array(); 
        }
    }
    public function get($table , $columns = null)
    {
        if (is_null($columns)) {
           return $this->db->get($table)->result_array(); 
        }else {
            $this->db->select($columns);
            $this->db->from($table);
            return $this->db->get()->result_array(); 
        }
    }

    public function get_where($table , $columns , $where)
    {
        $this->db->select($columns);
        $this->db->from($table);
        return $this->db->get_where($where)->result_array(); 
    }
    public function get_like($table, $columns, $title, $match, $pos = 'both')
    {
        $this->db->select($columns);
        $this->db->from($table);
        $query = $this->db->like( $title, $match , $pos )->get();  
        return $query->result_array(); 
    }


    public function get_unique($table , $w){
    	$query = $this->db->get_where($table, $w);
        return $query->first_row('array');
    }

    public function insert($table , $data){
        //var_dump($data); die('ready to insert');
        $this->db->insert($table , $data);           
        if($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        else {
            return false;
        }
    }
    
    public function insert_or_update($table , $data, $w = null){
        if (is_null($w)) {       
            $this->db->insert($table , $data);           
            if($this->db->affected_rows() > 0) {
                return $this->db->insert_id();
            }
            else {
                return false;
            }
        } else {
            $this->db->set($data)->where($w);
            $this->db->update($table);
            if($this->db->affected_rows() > 0) {
                return true;
            }
            else {
                return false;
            }    
        }
    }

    public function update($table, $data, $w ){
        $this->db->set($data)->where($w);
        $this->db->update($table);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

public function soft_delete($table, $w){
        $this->db->set('deleted', 1)->where($w);
        $this->db->update($table);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function delete($table , $w){
        // var_dump($data); die;
        $this->db->where($w)->delete($table);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function check ($table, $data) {
        $query = $this->db->get_where($table, $data);
        return $query->first_row('array');
    } 
}