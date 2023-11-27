<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('candidat_model' , 'candidat');
        $this->load->model('electeur_model' , 'electeur');

        $this->candidat->truncature();
    }

    public function index()
    {
        $this->load->view('home_login', array(
            'activeMenu' => 'home',
        ));
    }

    public function login()
    {
        if (isset($_SESSION['electeur'])) redirect(base_url('index.php/home/vote'));
        if (isset($_POST['connexion'])) {
            $errors = "";


            if (empty($this->input->post('email', true))) {
                $_SESSION['erreur'] = "Veuillez entrer votre email !";
            } else if (empty($this->input->post('matricule', true))) {
                $_SESSION['erreur'] = "Veuillez saisir votre matricule!";
            } else if (filter_var($this->input->post('email', true), FILTER_VALIDATE_EMAIL) == false) {
                $_SESSION['erreur'] = 'Votre email invalide';
            } else {
                $email = $this->input->post('email', true);
                $mat = $this->input->post('matricule', true);
                $matricule = $mat; //sha1($mat);

                //$pass = password_hash( $pass , PASSWORD_BCRYPT);
                $this->db->where('email', $email);
                $this->db->where('matricule', $matricule);
                $electeur = $this->db->get('electeur')->result_array();
                $nbElecteur = count($electeur);

                if ($nbElecteur != 1) {
                    $_SESSION['erreur'] = "Login ou password incorrect !";
                } else {
                    if ($electeur[0]['dejaVote'] == 1) {
                        $_SESSION['erreur'] = 'vous ne pouvez pas voter plusieur fois';
                        //$_SESSION['erreur'] = 'vous ne pouvez pas voter plusieur fois';
                        //redirect(base_url('index.php/home/login'));

                    } else if ($electeur[0]['email'] == $email && $electeur[0]['matricule'] == $matricule) {
                        unset($_POST);
                        $_SESSION['electeur'] = $electeur[0];

                        redirect(base_url('index.php/home/vote'));
                    }
                }
            }
        }

        $this->load->view('home_login', array(
            'errors' => isset($errors) ? $errors : null,
            'activeMenu' => 'vote',
        ));
    }


    public function vote($idCandidat = null, $idElecteur = null)
    {
        if (!isset($_SESSION['electeur'])) {
            redirect(base_url('index.php/home/login'));
        } else {
            if (!is_null($idCandidat)) {
                $idElecteur = $_SESSION['electeur']['id'];

                // si le vote est un bulletin null

                if( $idCandidat == 'none'){
                    $this->db->where('id', $idElecteur);
                    $this->db->update('electeur' , array(
                        'dejaVote' => 1,
                    ));
                    unset($_SESSION['electeur']);
                    redirect(base_url('index.php/home/candidat'));
                } else
                    // si le candidat a vote
                    if (is_numeric($idCandidat)) {


                        if ($_SESSION['electeur']['dejaVote'] == 1) {
                            $_SESSION['erreur'] = 'vous ne pouvez pas voter plusieur fois';
                        } else {

                            $result = $this->db->select('nbreVoie')->where('id', $idCandidat)->get('candidat')->result_array();
                            //$result2 = $this->db->select('dejaVote')->where('id', $idElecteur)->get('electeur')->result_array();

                            $nbreVoieActuel = ++$result[0]['nbreVoie'];

                            $this->db->trans_start();
                            $this->db->where('id', $idCandidat);
                            $this->db->update('candidat', array(
                                'nbreVoie' => $nbreVoieActuel,
                            ));
                            $this->db->where('id', $idElecteur);
                            $this->db->update('electeur', array(
                                'dejaVote' => 1,
                            ));
                            $this->db->trans_complete();

                            if ($this->db->trans_status() === FALSE) {
                                $_SESSION['erreur'] = "une erreur c'est produite pendant votre enregistrement ,"
                                    . " <br> veuillez contacter les dirigeant";
                            } else {
                                unset($_SESSION['electeur']);
                                redirect(base_url('index.php/home/'));
                            }
                        }
                    }
            }


            $membres = $this->db->get('bureau')->result_array();

            $this->db->order_by('nbreVoie', 'DESC');
            $candidats = $this->db->get('candidat')->result_array();
            $this->load->view('home_vote', array(
                'candidats' => $candidats,
                'membres' => $membres,
            ));
        }


    }

    public function winner( $page = null){

        $winners = $this->candidat->winner();

        $statistic = array();
        $statistic['nbElecteur'] = $this->electeur->count_all(); // nb elc
        $statistic['nbVotant'] = $this->electeur->count_votant(); //nb votant
        $statistic['sve'] = $this->candidat->get_SVE(); // sve
        $statistic['nbBulletinNull'] = $statistic['nbVotant'] - $statistic['sve']; // bulletin null
        $statistic['tauxParticipation'] = ($statistic['nbVotant'] / $statistic['nbElecteur']) * 100; // taux participation

        if(!is_null($page) && $page == 'all'){
            $membres = $this->db->get('bureau')->result_array();
            $winners = $this->candidat->winner();

            $statistic = array();
            $statistic['nbElecteur'] = $this->electeur->count_all(); // nb elc
            $statistic['nbVotant'] = $this->electeur->count_votant(); //nb votant
            $statistic['sve'] = $this->candidat->get_SVE(); // sve
            $statistic['nbBulletinNull'] = $statistic['nbVotant'] - $statistic['sve']; // bulletin null
            $statistic['tauxParticipation'] = ($statistic['nbVotant'] / $statistic['nbElecteur']) * 100; // taux participation

            $candidats = $this->candidat->get_all();
            $this->load->view('home_vote_all_winner' , array(
                'candidats' => $candidats,
                'winners' => $winners,
                'statistic' => $statistic,
                'membres' => $membres,
            ));

        }else{

            $winners = $this->candidat->winner();

            $this->load->view('home_vote_winner' , array(
                'winners' => $winners,

            ));
        }

    }

    public function author()
    {
        $this->load->view('author');
    }

    public function logout()
    {
        if (isset($_SESSION['electeur'])) unset($_SESSION['electeur']);
        redirect(base_url('index.php/home'));
    }

    public function candidat()
    {

        $membres = $this->db->get('bureau')->result_array();

        $this->db->order_by('nbreVoie', 'DESC');
        $candidats = $this->db->get('candidat')->result_array();

        $this->load->view('home_infos', array(
            'candidats' => $candidats,
            'membres' => $membres,
            'activeMenu' => 'infos',
        ));
    }

    public  function electeur(){
        $electeurs = $this->db->get('electeur')->result_array();
        $this->load->view('home_electeur', array(
            'electeurs' => $electeurs,
        ));
    }
}


