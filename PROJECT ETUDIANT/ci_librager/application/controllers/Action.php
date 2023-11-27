<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 24/03/16
 * Time: 12:02
 */
class Action extends NEAA_Controller {

    private $me = null;
    private $numero = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
    }

    public function supprimer($arg2) {
        if ($this->isAjaxRequest()) {
            if ($this->model->update('actions', ['deleted' => '1'], ['id' => $arg2])) {
                die('OK');
                // for no ajax
                //$_SESSION['flashAlert']['message'] = 'une action supprimé';
                //redirect(site_url("rapports/modifier").'/'.$_SESSION['current_rapport']);
            } else {
                die('NOK');
            }
        } else {
            if ($this->model->update('actions', ['deleted' => '1'], ['id' => $arg2])) {
                $_SESSION['flashAlert']['message'] = 'une action supprimé';
                redirect(site_url("rapports/modifier") . '/' . $_SESSION['current_rapport']);
            } else {
                $_SESSION['flashAlert']['message'] = 'echec de suppréssion';
                redirect(site_url("rapports/modifier") . '/' . $_SESSION['current_rapport']);
            }
        }
        redirect(site_url('rapports/consulter'));
    }

    public function restaurer($arg1) {

        redirect(site_url('rapports/consulter'));
    }

    public function modifier() {
        
    }

    public function ajouter() {

        if ($this->isAjaxRequest()) {
            $reponse['status'] = 'NOK';
            if (isset($_POST)) {
                $data['rapport_numero'] = $this->input->post('numeroRapport', TRUE);
                $data['intitule'] = $this->input->post('intitule', TRUE);
                $data['echeance'] = $this->input->post('echeance', TRUE);
                $data['concerne_id'] = $this->input->post('personneAssigne', TRUE);
                $data['date_enreg'] = $this->now;
                $data['deleted'] = 0;

                $this->db->trans_start();
                if ($this->model->insert('actions', $data)) {
                   
                    $reponse['log'] = 'une action inserées,';
                    //$reponse['data'] = $this->model->get_action($this->db->insert_id()); // $dernierActionAjoute
                    $reponse['status'] = 'OK';
                }
                $this->db->trans_complete();
            }
            echo(json_encode($reponse));
            die();
        }
    }

}
