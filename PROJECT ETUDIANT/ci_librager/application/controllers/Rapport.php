<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 24/03/16
 * Time: 12:02
 */
class Rapport extends NEAA_Controller {

    private $me = null;
    private $numero = null;

    public function __construct() {
        parent::__construct();

        if (!$this->isAuthenticated()) {

            redirect(site_url('login'));
        }

        $this->loadConfig();
        $this->load->model('model');

        if (is_null($this->me)) {
            //$this->me = $this->model->get_unique('Personne' , $_SESSION['myId'] );
            $this->me = $_SESSION['me'] = $this->model->get_personne($_SESSION['myId'], '*');
            $_SESSION['est_admin'] = $this->me['est_admin'];
        }
        if (isset($_SESSION['today_numero_rapport']) && !empty($_SESSION['today_numero_rapport'])) {
            $this->numero = $_SESSION['today_numero_rapport'];
        }
    }

    public function index() {

        //$this->modifier_profile();
        redirect(site_url('rapport/remplir'));
    }

    public function consulter() {

        $this->load->model('model');
        $delRapports = null;
        $otherRapports = null;
        $delPersonnes = null;
        $personnes = null;
        $corbeille = [];

        if ($this->me['est_admin'] == 1) {
            $otherRapports = $this->model->get_all_others_rapports();
            $delRapports = $this->model->get_all_others_del_rapports();
            $delPersonnes = $this->model->get_del_personnes();
            $personnes = $this->model->personnes;

            $corbeille = array_merge($delPersonnes, $delRapports);
        }
        $myDelRapports = $this->model->get_all_my_del_rapports($_SESSION['myId']);
        $myRapports = $this->model->get_all_my_rapports($_SESSION['myId']);

        $corbeille = array_merge($corbeille, $myDelRapports);
        shuffle($corbeille);


        $this->make_view('consulter_rapport', array(
            'titre' => 'Consultation | tous mes rapport',
            'mesRapports' => $myRapports,
            'autresRapports' => $otherRapports,
            'personnes' => $personnes,
            'entreprises' => $this->model->entreprises,
            'fonctions' => $this->model->fonctions,
            'corbeille' => $corbeille,
            'me' => $this->me,
        ));
    }

    public function supprimer($arg2) {
        // TODO update rapport_travail et rapport_action to -1 avant de delete
        if (isset($arg2)) {
            if ($this->model->update('rapports', ['deleted' => '0'], ['numero' => $arg2])) {
                redirect(site_url('rapport/consulter#bin'));
            }
        }
        redirect(site_url('rapport/consulter'));
    }

    public function restaurer($arg2) {
        if ($this->model->update('rapports', ['deleted' => '0'], ['id' => $arg2])) {
            redirect(site_url('rapport/consulter#bin'));
        }
        redirect(site_url('rapport/consulter'));
    }

    public function remplir() {
        if (isset($this->numero)) {
            //var_dump($this->numero); die('this num');
            if (empty($this->model->get_where('rapports', 'numero', ['numero' => $this->numero]))) {
                unset($_SESSION['today_rapport']);
            }
            $numero = $this->model->get_where('rapports', 'numero', [
                'personne_id' => $_SESSION['myId'],
                'date_enreg' => $this->now
            ]);
            if (!isset($numero) || empty($numero)) {
                $this->initialisation();
            } else {
                $this->update($this->numero);
            }
        } else {
            //die('init');
            $this->initialisation();
        }
    }

    public function detail($numero = null) {
        if (is_null($numero))
            redirect(site_url('rapport/consulter#mes-rapports'));

        $this->make_view('detail_rapport', [
            //$this->make_view('detail_rapport_preformat', [
            'titre' => 'detail de rapport',
            'rapport' => $this->model->get_rapport($numero),
        ]);
    }

    public function update($numero) {

        if (isset($_POST['update_rapport'])) {
            //die('to update');
            $data['rapport'] = array(
                'deleted' => 0,
                'objet' => $this->input->post('objet', TRUE),
                'duree' => $this->input->post('duree', TRUE),
                'heure_debut_service' => $this->input->post('heureDebutTravail', TRUE),
            );

            $updated = $this->model->update('rapports', $data['rapport'], [
                'numero' => $_SESSION['current_rapport'],
                'personne_id' => $_SESSION['myId']
            ]);
            if ($updated === FALSE) {
                unset($_POST['update_rapport']);
                var_dump($data);
                die('achec maj');
            } else {
                unset($_POST['update_rapport']);
                redirect(site_url('rapport/consulter#mes-rapport'));
            }

            //$this->model->ajouter_rapport($data);
        }
        if ($_SESSION['est_admin'] != 1 and ! $this->model->exist_rapport(['numero' => $_SESSION['today_rapport'], 'personne_id' => $_SESSION['myId']])) {
            die('Vous n\'avez pas le privilège de modifier le rapport d\'autrui, contact votre administrateur');
        }
        unset($_POST['update_rapport']);

        if (is_null($numero)) {
            die($numero);
            redirect(site_url('rapport/consulter#mes-rapport'));
        }

        $data = array(
            'rapport' => $this->model->get_rapport($numero),
            'titre' => 'mon espace',
            'superviseurs' => $this->model->get('personnes', ['id', 'nom', 'prenom'])
        );

        $_SESSION['current_rapport'] = $data['rapport']['numero'];
        $this->make_view('update_rapport_form', $data);
    }

    public function initialisation() {
        // creation du numero de rapport

        $rapport_existe = $this->model->exist_rapport(['date_enreg' => $this->now, 'personne_id' => $_SESSION['myId']]);
        //var_dump($rapport_existe); die;
        if (!$rapport_existe) {
            $this->load->helper('string');
            /* str_split(md5($this->now . '-' . $_SESSION['myId']), 10) */
            $_SESSION['today_numero_rapport'] = random_string('alnum', 10);
            $data = [
                'numero' => $_SESSION['today_numero_rapport'],
                'objet' => 'undefined',
                'personne_id' => $_SESSION['myId'],
                'date_enreg' => $this->now,
                'duree' => 0,
            ];
            $inserted = $this->model->insert('rapports', $data);
            //var_dump($inserted); die('id rapport');
            if (isset($inserted) && $inserted === FALSE) {
                unset($_SESSION['today_numero_rapport']);
                $this->numero = null;
                echo('ehec d\'initialisation du rapport de ce jour');
                die;
            } else {
                $this->numero = SESSION['today_numero_rapport'];
            }
        }  else {
            $numero = $this->model->get_where('rapports', 'numero', [
                'personne_id' => $_SESSION['myId'],
                'date_enreg' => $this->now
            ]);
            die($numero[0]);
            $this->numero = SESSION['today_numero_rapport'];
        }
        redirect(site_url('rapport/remplir'));
    }

}
