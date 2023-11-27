<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 24/03/16
 * Time: 12:02
 */
class travail extends NEAA_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
    }

    public function supprimer($arg1, $arg2) {
        if ($this->isAjaxRequest()) {
            if ($this->model->update('travaux', ['deleted' => '1'], ['id' => $arg2])) {
                die('OK');
                // for no ajax
                //$_SESSION['flashAlert']['message'] = 'un travail supprimé';
                //redirect(site_url("rapports/modifier").'/'.$_SESSION['current_rapport']);
            } else {
                die('NOK');
            }
        } else {
            die('no ajax');
        }
        redirect(site_url('rapports/consulter'));
    }

    public function restaurer($arg1, $arg2) {
        redirect(site_url('rapports/consulter'));
    }

    public function supprimer_pb($param) {
        if ($this->model->delete('probleme', ['id' => $param])) {
            $_SESSION['flashAlert']['message'] = 'un probleme supprimé';
            die('OK');
        }
    }

    public function insert_probleme() {
        if ($this->isAjaxRequest()) {
            if (isset($_POST['problemes'])) {
                $data['problemes'] = $this->input->post(null, TRUE);
                $data['id'] = '';
                $data['travail_id'] = '';
                $data['date_enreg'] = date('Y-m-d');
                if ($this->model->insert('travaux', $data)) {
                    die('inserted');
                }
            }
        }
    }

    public function get_travaux() {
        if ($this->isAjaxRequest()) {
            $travaux = $this->model->get('travaux', '*');

            if (!empty($travaux)) {
                die(json_encode($travaux));
            }
        }
    }

    public function ajouter($value = '') {
        if ($this->isAjaxRequest()) {
            if (isset($_POST)) {
                $reponse['status'] = 'NOK';
                $data['rapport_numero'] = $this->input->post('numeroRapport', TRUE);
                $data['intitule'] = $this->input->post('intitule', TRUE);
                $data['heure_debut'] = $this->input->post('heure_debut', TRUE);
                $data['heure_fin'] = $this->input->post('heure_fin', TRUE);
                $data['superviseur_id'] = $this->input->post('superviseurid', TRUE);
                $data['date_enreg'] = $this->now;
                $data['deleted'] = 0;
                $data['id'] = '';

                $problemes = $this->input->post('problemes');
                $this->db->trans_start();
                if ($this->model->insert('travaux', $data)) {
                    $travailId = $this->db->insert_id();
                    $reponse['log'] = 'un nouveau travail inserer,';

                    if (!empty($problemes)) {
                        //var_dump($problemes); die;
                        foreach ($problemes as $probleme) {
                            if (isset($probleme) && !empty($probleme)) {
                                if (isset($probleme['intitule']) && !empty($probleme['intitule'])) {
                                    // trim space and insert
                                    $data2['travail_id'] = $travailId;
                                    $data2['intitule'] = isset($probleme['intitule']) ? trim($probleme['intitule']) : "";
                                    $data2['description'] = isset($probleme['description']) ? trim($probleme['description']) : "";
                                    $data2['date_enreg'] = date('Y-m-d');
                                    $data2['id'] = '';
                                    if ($data2['intitule'] == "" && $data2['travail_id'] == "") {
                                        #code mettre status a NOK, poue la prochaine maintenance de la prochaine version
                                    } else {
                                        if ($this->model->insert('problemes', $data2)) {
                                            $reponse['log'] .= 'probleme ajouté,';
                                        }
                                    }
                                }
                            }
                        }
                    }

                    //$reponse['data'] = $this->model->get_travail($travailId); // $derniertravauxAjoute
                    $reponse['status'] = 'OK';
                }
                $this->db->trans_complete();
                echo(json_encode($reponse));
                die();
            }
        }
    }

}
