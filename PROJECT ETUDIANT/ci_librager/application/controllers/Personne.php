<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 24/03/16
 * Time: 12:02
 */
class Personne extends NEAA_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
    }

    public function ajouter() {
        //$this->form_validation->set_rules('user[fonction_id]', 'fonction', 'required');
        $this->form_validation->set_rules('user[nom]', 'Nom', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('user[prenom]', 'Prenom', 'trim|required|max_length[50]');
        //$this->form_validation->set_rules('user[motdepasse]', 'mot de passe', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('user[email]', 'email', 'trim|required|valid_email|is_unique[personnes.email]');
        if ($this->form_validation->run() == FALSE) {
            $_SESSION['flashAlert']['message'] = 'le formulaire a été mal rempli';
            $_SESSION['flashAlert']['type'] = 'warning';
        } else {
            $dataRegister = array(
                'email' => $this->input->post('user[email]', true),
                'motdepasse' => $this->make_mdp_md5($this->input->post('user[motdepasse]', true)),
                'nom' => $this->input->post('user[nom]', true),
                'prenom' => $this->input->post('user[prenom]', true),
                'tel' => $this->input->post('user[tel]'),
                'est_admin' => $this->input->post('user[est_admin]'),
                'fonction_id' => $this->input->post('user[fonction_id]'),
                'date_enreg' => $this->now(),
                'entreprise_id' => 1,
            );
            if (count($this->model->insert('personnes', $dataRegister)) == 0) {
                $_SESSION['flashAlert']['message'] = 'echec de creation de la personne';
                $_SESSION['flashAlert']['type'] = 'warning';
            }
        }
        redirect(site_url('rapport/consulter#personnel'));
    }

    public function modifier($id) {
        if (isset($_POST['update_personne']) && isset($id)) {
            //$this->form_validation->set_rules('user[fonction_id]', 'fonction', 'required');
            $this->form_validation->set_rules('user[nom]', 'Nom', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('user[prenom]', 'Prenom', 'trim|required|max_length[50]');
            //$this->form_validation->set_rules('user[motdepasse]', 'mot de passe', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('user[email]', 'email', 'trim|required|valid_email');
            if ($this->form_validation->run() == FALSE) {
                $_SESSION['flashAlert']['message'] = 'le formulaire a été mal rempli';
                $_SESSION['flashAlert']['type'] = 'warning';
            } else {
                $dataRegister = array(
                    'email' => $this->input->post('user[email]', true),
                    'motdepasse' => $this->make_mdp_md5($this->input->post('user[motdepasse]', true)),
                    'nom' => $this->input->post('user[nom]', true),
                    'prenom' => $this->input->post('user[prenom]', true),
                    'tel' => $this->input->post('user[tel]'),
                    'est_admin' => $this->input->post('user[est_admin]'),
                    'fonction_id' => $this->input->post('user[fonction_id]'),
                    'date_enreg' => $this->now(),
                    'entreprise_id' => 1,
                );
                if ($this->model->update('personnes', $dataRegister, ['id' => $id])) {
                    $_SESSION['flashAlert']['message'] = 'echec de modification de la personne';
                    $_SESSION['flashAlert']['type'] = 'warning';
                }
            }
            unset($_POST['update_personne']);
            redirect(site_url('rapport/consulter#personnel'));
        }
        $person = $this->model->get_where('personnes', '*', ['id' => $id])[0];
        $entreprises = $this->model->entreprises;
        $fonctions = $this->model->fonctions;
        //var_dump($person); die;
        $this->make_view('personne/update_person_form', compact('person', 'entreprises','fonctions'));
    }

    public function modifier_profile() {
        if (isset($_POST['modifierProfile'])) {
            $post = $this->input->post(null, true);
            /*
              $data = [];
              if (isset($post['changerInfosProfil']) && $post['changerInfosProfil']=='on') {
              $data['nom'] = $post['nomPers'];
              $data['prenom'] = $post['prenomPers'];
              $data['tel'] = $post['telPers'];
              }
             */
            if (isset($post['changerInfosConnex']) && $post['changerInfosConnex'] == 'on') {
                $data['email'] = $post['emailPers'];

                $ancienMdp = $this->make_mdp_md5($post['ancienMdp']);
                if ($this->model->exist_mdp($_SESSION['myId'], $ancienMdp)) {
                    $data['motdepasse'] = $this->make_mdp_md5($post['nouveauMdp']);
                }
            }
            if (!empty($data)) {
                //die('good');
                $updated = $this->model->update('personnes', $data, array(
                    'id' => $_SESSION['myId'],
                ));
                if ($updated) {
                    $_SESSION['erreur'] = 'operation reussite';
                } else
                    $_SESSION['erreur'] = 'operation echoué';
            }
            redirect(site_url('rapport/consulter#profile'));
        }
    }

    public function delete($arg1, $arg2) {
        if ($this->model->update('personnes', ['deleted' => '1'], ['id' => $arg2])) {
            $_SESSION['flashAlert']['message'] = 'une personne supprimé';
            redirect(site_url('rapport/consulter#personnel'));
        }
        redirect(site_url('rapport/consulter'));
    }

    public function undelete($arg1, $arg2) {
        if ($this->model->update('personnes', ['deleted' => '0'], ['id' => $arg2])) {
            redirect(site_url('rapport/consulter#bin'));
        }
        redirect(site_url('rapport/consulter'));
    }

    public function delete_fonction($id) {
        if ($this->model->delete('fonctions', ['id' => $id])) {
            $_SESSION['flashAlert']['message'] = 'une fonction supprimé';
            die('OK');
        }
    }

    public function delete_entreprise($id) {
        if ($this->model->delete('entreprises', ['id' => $id])) {
            $_SESSION['flashAlert']['message'] = 'une fonction supprimé';
            die('OK');
        }
    }

    public function restaurer($id) {
        if ($this->model->update('personnes', ['deleted' => '0'], ['id' => $id])) {
            redirect(site_url('rapports/consulter#bin'));
        }
    }

}
