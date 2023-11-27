<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends NEAA_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Model', 'model');
        $this->load->model('User', 'user');
        $this->load->model('Book', 'book');
    }

    public function index() {
        redirect(site_url('admin/login'));
    }

    public function register() {

        $email = $this->input->post('email');

        if ($this->user->checkEmail(array('email' => $email))) {
            $dataMessage = array('status' => 'error', 'message' => 'Email already exist. Try other email.');
            echo json_encode($dataMessage);
        } else {
            $dataRegister = array('email' => $email, 'password' => $this->input->post('password'), 'firstname' => $this->input->post('firstname'), 'lastname' => $this->input->post('lastname'));

            if ($this->user->registerNewUser($dataRegister)) {
                $dataMessage = array('status' => 'success', 'message' => 'Account created. You may now login.');
                echo json_encode($dataMessage);
            } else {
                $dataMessage = array('status' => 'error', 'message' => 'Can\'t create your account. Contact Jumpstart Creatives Support. <a href="http://jumpstartcreatives.com/contact-us">Click here</a>');
                echo json_encode($dataMessage);
            }
        }
    }

    public function auth() {

        if (isset($_POST['adminLogin'])) {

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('motdepasse', 'Mot de passe', 'required|min_length[5]');

            if ($this->form_validation->run() !== FALSE) {
                $dataLogin = array('login' => $this->input->post('email'),
                    'password' => $this->make_mdp_md5($this->input->post('motdepasse')),
                    'is_admin' => 1
                );
                $userData = $this->model->get_unique('administrateur', $dataLogin);
                //var_dump($dataLogin);
                if (!$userData) {
                    $_SESSION['flash_message'] = array('type' => 'warning', 'status' => 'error', 'message' => 'Invalid Email / Password');
                    $this->session->set_flashdata('flash', 'vous n\'avez pas les droits d\'un administrateur');
                } else {

                    $userdata = array('userid' => $userData['id'], 'email' => $userData['login'],
                        'loggedin' => 1, 'is_admin' => $userData['is_admin']);
                    $this->session->set_userdata('admin', $userdata);
                    redirect('admin/dashboard');
                }
            } else {
                
            }
            unset($_POST);
        }
    }

    public function login() {

        if (isset($_SESSION['admin']['loggedin'])) {
            redirect(site_url('admin/dashboard'));
        }else{
            $this->auth();
            $this->make_view('login_admin', ['titre' => 'Connexion Administrateur', 'header' => 'header_login',]);
        }
    }

    public function logout() {

        unset($_SESSION['admin']);
        redirect(site_url('admin/login'));
    }

    public function dashboard() {
        if (isset($_SESSION['admin']['loggedin'])) {
            $data['categories'] = $this->model->getAll('categorie');
            $data['editions'] = $this->model->getAll('edition');
            $data['catalogues'] = $this->model->getAll('catalogue');
            $data['auteurs'] = $this->model->getAll('auteur');
            $data['rayons'] = [];
            $data['personnes'] = $this->model->get_undeleted('personne');
            $data['locations'] = $this->model->get_emprunts();
            $data['books'] = $this->book->getAll('livre');

            $data['titre'] = "Administrateur";
            $data['header'] = "header_admin";
            //var_dump($data['locations']); die;
            //$this->load->view('layouts/header_admin');
            $this->make_view('dashboard_admin', $data);
        } else {
            redirect(site_url('admin/login'));
        }
    }

    public function add($elem) {
        //var_dump($_POST); die;
        if (isset($elem)) {
            $data = array();
            $table = $elem;
            if (in_array($elem, ['categorie', 'catalogue', 'edition', 'auteur'])) {
                $data['nom'] = $this->input->post('nom');
                $data['id'] = '';
            }
            if ($elem === 'auteur') {
                $data['sexe'] = $this->input->post('sexe');
            }
            if (in_array($elem, ['edition', 'auteur'])) {
                $data['pays'] = $this->input->post('pays');
            }

            $text = json_encode($data);
            //die($text);
            if ($this->isAjaxRequest()) {
                if ($this->model->insert($table, $data)) {
                    die('ok');
                } else {
                    die('echec');
                }
            } else {
                if ($this->model->insert($table, $data)) {
                    $_SESSION['flashAlert'] = array('type' => 'success', 'message' => 'Element ajouté');
                } else {
                    $_SESSION['flashAlert'] = array('type' => 'warning', 'message' => 'Erreur survenue');
                }
            }
            redirect(site_url("admin/dashboard"));
        }
    }

    public function loan($elem, $persId = null, $livreId = null) {
        switch ($elem) {
            case 'add':
                if (isset($_POST)) {
                    $data = $this->input_post();
                    unset($data['addLoan']);
                    $cond = ['livreId' => $data['livreId'], 'personneId' => $data['personneId']];
                    $exists = !is_null( $this->model->get_unique('emprunt', $cond)) ;
                    if($exists){
                        die('Ce livre est deja emprunte par cette personne');
                    }else{
                        if ($this->db->insert('emprunt' , $data)) {
                            redirect('admin/dashboard#loans');
                        } else {
                            die('echec insertion');
                        }
                    }
                }
                break;
            case 'update':
                if (isset($_POST['updateLoan'])) {
                    $data = $this->input_post();
                    //unset($data['updateLoan']);
                    //var_dump($data); 
                    if ($this->model->update('emprunt', ['dateRetour' => $data['dateRetour']], ['personneId' => $persId, 'livreId' => $livreId])) {
                        $_SESSION['flash_message'] = array('type' => 'success', 'message' => 'un emprunt modifier.');
                        redirect(site_url("admin/dashboard#loans"));
                    } else {
                        $_SESSION['flash_message'] = array('type' => 'warning', 'message' => 'une erreur est survenue pendant la modication');
                    }
                }

                $this->make_view('update_loan_form', array('loan' => $this->model->get_emprunt($persId, $livreId), 'header' => 'header_admin', 'title' => 'Prolongement d\'un emprunt'
                        // 'personnes' => $this->model->get_undeleted('personne'),
                        //'books' => $this->book->getAll(),
                ));
                unset($_POST);
                break;

            case 'delete':

                $data = $this->input_post();
                $cond = ['livreId' => $livreId, 'personneId' => $persId];
                $this->model->delete('emprunt', $cond);

            default:
                redirect(site_url('admin/dashboard#loans'));
                break;
        }
    }

    public function person($elem, $id = null) {
        switch ($elem) {
            case 'add':
                if (isset($_POST)) {
                    $data = $this->input_post();
                    unset($data['addBook']);
                    //var_dump($data); die('incoming data');
                    $this->form_validation->set_rules('motdepasse', 'Mot de passe', 'required');
                    $this->form_validation->set_rules('motdepasseConfirmation', 'Mot de passe', 'required|matches[motdepasse]');
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[personne.email]');
                    $this->form_validation->set_rules('nom', 'Nom', 'required');
                    $this->form_validation->set_rules('level', 'niveau', 'required|in_list[client,libraire]');


                    if ($this->form_validation->run() == FALSE) {
                        $this->dashboard();
                    } else {
                        if ($data['motdepasse'] != $data['motdepasseConfirmation']) {
                            
                        } else {
                            unset($data['motdepasseConfirmation']);
                            if ($this->model->insert_personne($data)) {
                                redirect('admin/dashboard#personne');
                            } else {
                                die('echec insertion');
                            }
                        }
                    }
                }
                break;

            case 'update':
                if (isset($_POST['updatePerson'])) {
                    $data = $this->input_post();
                    unset($data['updatePerson']);
                    //var_dump($data); die('incoming data');
                    $this->form_validation->set_rules('motdepasse', 'Mot de passe', 'required');
                    $this->form_validation->set_rules('motdepasseConfirmation', 'Mot de passe', 'required|matches[motdepasse]');
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[personne.email]');
                    $this->form_validation->set_rules('nom', 'Nom', 'required');
                    $this->form_validation->set_rules('level', 'niveau', 'required|in_list[client,libraire]');


                    if ($this->form_validation->run() == FALSE) {
                        $this->dashboard();
                    } else {
                        if ($data['motdepasse'] != $data['motdepasseConfirmation']) {
                            
                        } else {


                            if ($this->model->update_personne($data, $id)) {

                                die('inserted');
                                redirect('admin/dashboard#personne');
                            } else {
                                die('echec insertion');
                            }
                        }
                    }
                }
                $this->make_view('update_person_form', array('person' => $this->model->get_unique('personne', ['id' => $id]), 'titre' => 'Mise a jour d\' un individu', 'header' => 'header_admin',));
                break;


            default:
                redirect('admin/dashboard#personne');
                break;
        }
    }

    public function make_slug($titre) {
        return isset($titre) && !empty($titre) ? str_replace(' ', '-', trim($titre)) : "";
    }

    public function del($elem, $id) {
        switch ($elem) {
            case 'loan':
                $this->model->soft_delete('emprunt', ['id' => $id]);

                redirect(site_url('admin/dashboard/#loans'));
                break;
            case 'person':
                $this->model->soft_delete('personne', ['id' => $id]);

                redirect(site_url('admin/dashboard/#persons'));
                break;
            case 'book':
                $this->model->soft_delete('livre', ['id' => $id]);

                redirect(site_url('admin/dashboard/#books'));
                break;
            default:
                #code...
                break;
        }
    }

    // TODO l ajout de livre n insert pas tjr la date denregistreent et les autres dates
    public function book($action, $id = null) {
        if (is_null($action)) {
            redirect(site_url('admin/dashboard'));
        }
        switch ($action) {
            case 'add':
                if (isset($_POST['addBook'])) {
                    $data = [];

                    $data['id'] = '';
                    $data['titre'] = $this->input->post('titre');
                    $data['slug'] = $this->make_slug($this->input->post('titre'));
                    $data['isbn'] = $this->input->post('isbn');
                    $data['nbPage'] = $this->input->post('nbPage');
                    $data['tome'] = $this->input->post('tome');
                    $data['dateParution'] = $this->input->post('dateParution');
                    $data['dateEnreg'] = date('Y-m-d');
                    $data['langue'] = $this->input->post('langue');

                    $data['auteurId'] = $this->input->post('auteurId');
                    $data['rayon'] = [];
                    $data['categorieId'] = $this->input->post('categorieId');
                    $data['editionId'] = $this->input->post('editionId');
                    $data['catalogueId'] = $this->input->post('catalogueId');

                    $data['deleted'] = $data['nbLecture'] = 0;

                    //$data['resumer'] = $this->input->post('resumer');
                    //var_dump($data); die('incomimg data');

                    if ($this->model->insert('livre', $data)) {
                        $this->session->set_flashdata('flashAlert', ['type' => 'success', 'message' => 'un livre ajouté',]);
                        //var_dump($data); die('inset');
                    } else {
                        //var_dump($data); die('make');
                        $this->session->set_flashdata('flashAlert', ['type' => 'success', 'message' => 'erreur survenue',]);
                    }
                    redirect(site_url('admin/dashboard'));
                }
                break;
            case 'update':
                if (isset($_POST['updateBook'])) {

                    $data = [];


                    $data['titre'] = $this->input->post('titre');
                    $data['slug'] = $this->make_slug($this->input->post('titre'));
                    $data['isbn'] = $this->input->post('isbn');
                    $data['nbPage'] = $this->input->post('nbPage');
                    $data['tome'] = $this->input->post('tome');
                    $data['dateParution'] = $this->input->post('dateParution');
                    $data['dateEnreg'] = date('Y-m-d');
                    $data['langue'] = $this->input->post('langue');
                    $data['auteurId'] = $this->input->post('auteurId');
                    $data['rayon'] = $this->input->post('rayon');
                    $data['categorieId'] = $this->input->post('categorieId');
                    $data['editionId'] = $this->input->post('editionId');
                    $data['catalogueId'] = $this->input->post('catalogueId');

                    //$data['deleted'] = $this->input->post('deleted'); 
                    //$data['nbLecture'] = $this->input->post('nbLecture');

                    $data['resumer'] = $this->input->post('resumer');

                    //var_dump($data); die;

                    if ($this->model->update('livre', $data, ['id' => $id])) {
                        $this->session->set_flashdata('flashAlert', ['type' => 'success', 'message' => 'un livre modifié',]);
                        //var_dump($data); die('inset');
                        redirect(site_url('admin/dashboard/book/update/' . $id));
                    } else {
                        var_dump($data);
                        die('make');
                        $this->session->set_flashdata('flashAlert', ['type' => 'success', 'message' => 'erreur survenue',]);
                    }
                }
                unset($_POST);

                $book = $this->book->getBook($id);
                $locale = $this->model->getAll('locale');

                $this->make_view('update_book_form', array('book' => $book,
                    'categories' => $this->model->getAll('categorie'), 'editions' => $this->model->getAll('edition'),
                    'catalogues' => $this->model->getAll('catalogue'), 'auteurs' => $this->model->getAll('auteur'),
                    'locations' => $this->model->get_emprunts(),
                    'titre' => 'Mise a jour du livre', 'header' => 'header_admin',
                    "locales" => $locale,
                    "tomes" => [
                        ['code' => '1', 'nom' => 'Tome I'],
                        ['code' => '2','nom' => 'Tome II'],
                        ['code' => '3','nom' => 'Tome III'],
                        ['code' => '4','nom' => 'Tome IV'],
                        ['code' => '5','nom' => 'Tome V']
                    ]
                    ));
                break;

            default:
                #code...
                break;
        }
    }

}
