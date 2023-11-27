<?php

require_once __DIR__.'/MY_Model.php';
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio nkumbe
 * Date: 01/02/16
 * Time: 19:05
 */
//TODO AJOUTER COE HELPER AU STARTER KIT include_once '../libs/PDO/Db.class.php';
class NEAA_Model extends MY_Model {

    public function getAll($table) {
        return $this->db->get($table)->result_array();
    }

    public function get($table, $columns) {
        $this->db->select($columns);
        $this->db->from($table);
        return $this->db->get()->result_array();
    }

    public function get_where($table, $columns, $where) {
        $this->db->select($columns);
        $this->db->from($table);
        return $this->db->where($where)->get()->result_array();
    }

    public function get_like($table, $columns, $title, $match, $pos = 'both') {
        $this->db->select($columns);
        $this->db->from($table);
        $query = $this->db->like($title, $match, $pos)->get();
        return $query->result_array();
    }

    public function get_unique($table, $id) {
        $data = array(
            'id' => $id
        );
        $query = $this->db->get_where($table, $data);
        return $query->first_row('array');
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update($table, $data, $bind) {
        $this->db->set($data)->where($bind);
        $this->db->update($table);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $data) {
        // var_dump($data); die;
        $this->db->where($data)->delete($table);
        die();
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check($table, $data) {
        $query = $this->db->get_where($table, $data);
        return $query->first_row('array');
    }

}
