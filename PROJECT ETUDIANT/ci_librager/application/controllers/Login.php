<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends NEAA_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model', 'model');
    }

    public function index() {

        die($this->make_mdp_md5($this->input->post('motdepasse')));
        if (isset($_SESSION['myId']) && isset($_SESSION['loggedin'])) {
            redirect(site_url('rapports/consulter'));
        }else{
            redirect(site_url('login/signup'));
        }
    }

    public function signup () {
        if (isset($_SESSION['myId']) && isset($_SESSION['loggedin'])) {
            redirect(site_url('rapports/consulter'));
        }
        $this->make_view('login_admin', [
            'titre'=> 'Create an Account',
            'fonctions' => $this->model->fonctions,
        ]);

    }

    public function signout(){
        unset($_SESSION['myId']);
        unset($_SESSION['loggedin']);
        redirect(site_url('login'));
    }

    public function register() {
        if (isset($_SESSION['myId']) && isset($_SESSION['loggedin'])) {
            redirect(site_url('rapports/consulter'));
        }

        //var_dump($_POST); die;
        $this->form_validation->set_rules('fonctionId', 'fonction', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('motdepasse', 'mot de passe', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('motdepasseconf', 'mot de passe confirmation', 'trim|required|matches[motdepasse]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[Personne.email]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->signup();
        }else{
            $dataRegister = array(
                'email' => $this->input->post('email', true),
                'motdepasse' => $this->make_mdp_md5($this->input->post('motdepasse', true)),
                'nom' => $this->input->post('nom' , true),
                'prenom' => $this->input->post('prenom', true),
                'tel' => $this->input->post('tel', true),
                'date_enreg' => $this->now(),
                'est_admin' => 0,
                'Entrepriseid' => 1,
                'Fonctionid' => $this->input->post('fonctionId'),
            );

            if($id = $this->model->insert('Personne' , $dataRegister)) {
                $userdata = array(
                    'myId' => $id,
                    'email'    => $dataRegister['email'],
                    'loggedin'      => 1,
                );
                $this->session->set_userdata($userdata);
                //$dataMessage = array('status' => 'success', 'message' => 'Account created. You may now login.');
                //echo json_encode($dataMessage);
            } else {
                $dataMessage = array('status' => 'error', 'message' => 'Can\'t create your account. Contact Jumpstart Creatives Support. <a href="http://jumpstartcreatives.com/contact-us">Click here</a>');
                //echo json_encode($dataMessage);
            }

        }
        $this->signup();
    }

    public function auth(){
        unset($_SESSION['erreur']);
        if (isset($_SESSION['myId']) && isset($_SESSION['loggedin'])) {
            redirect(site_url('rapports/consulter'));
        }
        $this->form_validation->set_rules('motdepasse', 'mot de passe', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');


        if ($this->form_validation->run() == FALSE)
        {
            $this->signup();
        }
        else
        {
            $dataLogin = array('email' => $this->input->post('email'),
                                'password' => $this->make_mdp_md5($this->input->post('motdepasse')),
            );
            $userData = $this->model->check_login($dataLogin);
            $canLoggedIn = (!empty($userData)) ? true : false;
            if (!$canLoggedIn) {
                $_SESSION['erreur'] = 'login / mot de passe incorrect';
                $dataMessage = array('status' => 'error', 'message' => 'Invalid Email / Password');
                //echo json_encode($dataMessage);
            } else {
                unset($_POST);
                $userdata = array(
                    'myId' => $userData['id'],
                    'email'    => $userData['email'],
                    'loggedin'      => 1,
                );
                $this->session->set_userdata($userdata);
                //$dataMessage = array('status' => 'success', 'message' => 'Please wait for redirection.', 'redirect' => '/users/chatboard');
                //echo json_encode($dataMessage);
                redirect(site_url('rapports/remplir'));
            }
        }
        $this->signup();
    }
}