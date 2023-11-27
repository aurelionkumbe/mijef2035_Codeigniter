<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public $error = array();
    private $data = array();

    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['admin'])) {
            $this->data['admin_infos'] = $_SESSION['admin'];
        }
        $this->error = isset ($_SESSION['erreur']) ? $_SESSION['erreur'] : null;
        unset($_SESSION['erreur']);

        $this->load->model('candidat_model' , 'candidat');
        $this->load->model('electeur_model' , 'electeur');

       //echo sha1('administrateurvote@iai'); die;
    }

    public function index()
    {

        if (isset($_SESSION['admin'])) {
            redirect(base_url('index.php/admin/home'));
        } else {
            redirect(base_url('index.php/admin/login'));
        }
    }

    public function login()
    {

        if (isset($_SESSION['admin'])) redirect(base_url('index.php/admin/home'));
        if (isset($_POST['connexion'])) {
            $errors = "";

            if (empty($this->input->post('login', true))) {
                $errors = "Veuillez entrer votre login !";
            } else {
                if (empty($this->input->post('pwd', true))) {
                    $errors = "Veuillez saisir votre mot de pass !";
                } else {
                    $login = $this->input->post('login', true);
                    $pass = $this->input->post('pwd', true);
                    $pass = sha1($pass);

                    //$pass = password_hash( $pass , PASSWORD_BCRYPT);
                    $this->db->where('login', $login);
                    $this->db->where('password', $pass);
                    $admin = $this->db->get('admin')->result_array();
                    $nbAdmin = count($admin);


                    if ($nbAdmin != 1) {
                        $errors = "Login ou password incorrect !";
                    } else {
                        if ($admin[0]['login'] == $login &&
                            $admin[0]['password'] == $pass
                        ) {
                            unset($_POST);
                            $_SESSION['admin'] = $admin[0];

                            redirect(base_url('index.php/admin/home'));
                        }
                    }
                }
            }
        }

        $this->load->view('admin_login', array(
            'errors' => isset($errors) ? $errors : null,
        ));
    }

    public function home()
    {
        if (!isset($_SESSION['admin'])) redirect(base_url('index.php/admin/login'));

        $membres = $this->candidat->get_membre();

        $this->db->select('*' , 'totalVote');
        $this->db->where('dejaVote', 1);
        $totalVote = $this->db->get('electeur')->result_array();

        $this->db->order_by('nbreVoie', 'DESC');
        $candidats = $this->db->get('candidat')->result_array();

        $statistic = array();
        $statistic['nbElecteur'] = $this->electeur->count_all(); // nb elc
        $statistic['nbVotant'] = $this->electeur->count_votant(); //nb votant
        $statistic['sve'] = $this->candidat->get_SVE(); // sve
        $statistic['nbBulletinNull'] = $statistic['nbVotant'] - $statistic['sve']; // bulletin null
        $statistic['tauxParticipation'] = ($statistic['nbVotant'] / ($statistic['nbElecteur']==0 ? 1 : $statistic['nbElecteur'])) * 100; // taux participation
        $statistic['tauxParticipation'] = round($statistic['tauxParticipation'] , 2);

        $this->load->view('admin_index', array(
            'admin' => $this->data['admin_infos'],
            'candidats' => $candidats,
            'statistic' => $statistic,
            'membres' => $membres,
            'totalVote' => count($totalVote),
        ));
    }

    public function logout()
    {
        if (isset($_SESSION['admin'])) unset($_SESSION['admin']);
        redirect(base_url('index.php/home'));
    }


    public function candidat($action = null, $id = null)
    {
        // loading view
        $this->load->view('partial/head');
        $this->load->view('partial/admin_header');

        switch ($action) {

            case "add" :
                // todo : controler l unicite de l email
                if (isset($_POST['enregistrer'])) {
                    $nom = htmlspecialchars(trim($_POST['nom']));
                    $prenom = htmlspecialchars(trim($_POST['prenom']));
                    $sexe = htmlspecialchars(trim($_POST['sexe']));
                    $dateNais = htmlspecialchars($_POST['dateNais']);
                    $mail = htmlspecialchars(trim($_POST['mail']));
                    $mail2 = htmlspecialchars(trim($_POST['mail2']));
                    $commentaire = $_POST['commentaire'];
                    $telephone = htmlspecialchars($_POST['telephone']);
                    $slogan = htmlspecialchars(trim($_POST['slogan']));
                    $couleur = htmlspecialchars(trim($_POST['couleur']));
                    $nomphoto = $_FILES['photo']['name'];
                    $fichtmp = $_FILES['photo']['tmp_name'];
                    if (isset($fichtmp)) {
                        move_uploaded_file($fichtmp, "./images/photo/$nomphoto");
                    }
                    if ($mail == $mail2) {
                        $this->db->where('email', $mail);
                        $exist = count($this->db->get('candidat')->result_array());
                        if ($exist == 0) {
                            $insert_data = array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'sexe' => $sexe,
                                'datenaissance' => $dateNais,
                                'photo' => $nomphoto,
                                'telephone' => $telephone,
                                'email' => $mail,
                                'slogan' => $slogan,
                                'couleur' => $couleur,
                                'commentaire' => $commentaire,
                            );

                            if ($this->db->insert('candidat', $insert_data)) {
                                redirect(base_url('index.php/admin/candidat'));
                            }
                        } else {
                            $_SESSION['erreur'] = "cet email deja utilise";
                        }
                    }

                } else {
                    $this->load->view('include/admin_candidat_add', array(
                        'erreur' => is_null($this->error) ? '' : $this->error,
                    ));
                }
                break;

            case "del" :
                if ($id != null) {
                    $this->db->where('id', $id);
                    $this->db->delete('candidat');
                }
                redirect(base_url('index.php/admin/home'));
                break;

            case 'edit' :

                if (isset($_POST['enregistrer'])) {
                    if (isset($_FILES['photo']['tmp_name'])) {
                        $photo = $_FILES['photo'];
                    }
                    $photo_recover = $_POST['photo_recover'];

                    $id_post = htmlspecialchars(trim($_POST['id']));
                    $nom = htmlspecialchars(trim($_POST['nom']));
                    $prenom = htmlspecialchars(trim($_POST['prenom']));
                    $sexe = htmlspecialchars(trim($_POST['sexe']));
                    $dateNais = htmlspecialchars($_POST['dateNais']);
                    $mail = htmlspecialchars(trim($_POST['mail']));
                    $mail2 = htmlspecialchars(trim($_POST['mail2']));
                    $slogan = htmlspecialchars(trim($_POST['slogan']));
                    $couleur = htmlspecialchars(trim($_POST['couleur']));
                    $commentaire = $_POST['commentaire'];
                    $telephone = htmlspecialchars($_POST['telephone']);
                    $nomphoto = isset($photo['name']) ? $photo['name'] : null;
                    $fichtmp = isset($photo['tmp_name']) ? $photo['tmp_name'] : null;

                    if (isset($fichtmp))
                        move_uploaded_file($fichtmp, base_url("images/photo/" . $nomphoto));

                    if ($mail == $mail2) {
                        $update_data = array(
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'sexe' => $sexe,
                            'dateNaissance' => $dateNais,
                            'photo' => isset($nomphoto) && !empty($nomphoto) ? $nomphoto : $photo_recover,
                            'telephone' => $telephone,
                            'email' => $mail,
                            'slogan' => $slogan,
                            'couleur' => $couleur,
                            'commentaire' => $commentaire,
                        );


                        $this->db->where('id', $id_post);
                        if ($this->db->update('candidat', $update_data)) {
                            redirect(base_url('index.php/admin/candidat'));
                        }
                    }

                } else {

                    if (!is_null($id)) {
                        $this->db->where('id', $id);
                        $candidat = $this->db->get('candidat')->result_array();

                        $this->load->view('include/admin_candidat_edit', array(
                            'candidat' => $candidat[0],
                        ));
                    } else {
                        redirect('index.php/admin/home');
                    }
                }
                break;

            case 'membre' :

                if (isset($_POST['enregistrer'])) {
                    //var_dump($_POST); die;
                    for ($i = 1; $i <= 11; $i++) {
                        $candidats[$i]['select'] = $this->input->post('select' . $i , true);
                        $candidats[$i]['nom'] = $this->input->post('nom' . $i , true);
                        $candidats[$i]['poste'] = $this->input->post('poste' . $i , true);
                        $candidats[$i]['sexe'] = $this->input->post('sexe' . $i , true);
                        $candidats[$i]['candidatId'] = $this->input->post('candidatId' . $i , true);
                    }
                    foreach($candidats as $candidat){
                        if(!is_null($candidat['select']) && $candidat['select'] == 'oui'){
                            $insert_data = array(
                                'nom' => $candidat['nom'],
                                'poste' => $candidat['poste'],
                                'sexe' => $candidat['sexe'],
                                'candidat_id' => $candidat['candidatId'],
                            );
                            $this->db->set($insert_data)->insert('bureau');
                        }
                    }
                    unset($_POST);
                }
                $membres = $this->db->order_by('candidat_id , id')->get('bureau')->result_array();
                $candidats = $this->db->select('id , nom , prenom , photo')->get('candidat')->result_array();
                $this->load->view('include/admin_candidat_membre', array(
                    'candidats' => $candidats,
                    'membres' => $membres,
                ));

                break;
            case null :
            default :

                $candidats = $this->db->get('candidat')->result_array();
                $this->load->view('include/admin_candidat_list', array(
                    'candidats' => $candidats,

                ));
        }

        $this->load->view('partial/footer');
        $this->load->view('partial/foot');
    }

    public function electeur($action = null, $id = null)
    {

        // loading view
        $this->load->view('partial/head');
        $this->load->view('partial/admin_header');

        switch ($action) {

            case "add" :
                // todo : controler l unicite de l email

                if (isset($_POST['enregistrer'])) {
                    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['sexe'])
                        //and !empty($_POST['dateNais']) and
                        //!empty($_POST['mail']) and !empty($_POST['mail']) and
                        //!empty($_POST['telephone'])
                    ) {
                        $mat = $this->make_matricule($longueur = 3);
                        $nom = htmlspecialchars(trim($_POST['nom']));
                        $prenom = htmlspecialchars(trim($_POST['prenom']));
                        $sexe = htmlspecialchars(trim($_POST['sexe']));
                        $dateNais = htmlspecialchars(trim($_POST['dateNais']));
                        $telephone = htmlspecialchars(trim($_POST['telephone']));


                        $this->db->where('nom', $nom);
                        $this->db->where('prenom', $prenom);
                        $this->db->where('sexe', $sexe);
                        $this->db->where('dateNaissance', $dateNais);
                        $this->db->where('telephone', $telephone);
                        $electeur = $this->db->get('electeur')->result_array();

                        $nom1 = explode(' ' , $nom);

                        $mail = $nom1[0] . '@gmail.com';

                        $existe = count($electeur);
                        $erreur = null;

                        if ($existe != 0) {
                            $erreur = "La personne existe deja !";
                        } else {
                            $insert_data = array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'sexe' => $sexe,
                                'datenaissance' => $dateNais,
                                'telephone' => $telephone,
                                'email' => $mail,
                                'matricule' => $mat,
                            );

                            if ($this->db->insert('electeur', $insert_data)) {
                                $_SESSION['info'] = '<div class="alert alert-info">Enregistrement termin� matricule est :<h5 class="alert-success" style="text-align: center;">' . $mat . '</h5> </div>';
                                unset($_POST);
                                redirect(base_url('index.php/admin/electeur'));
                            }
                        }

                        $_SESSION['erreur'] = $erreur;
                    } else {
                        $_SESSION['erreur'] = "Les champs sont obligatoires !";
                        $this->load->view('include/admin_electeur_add');
                    }
                } else {
                    $this->load->view('include/admin_electeur_add');
                }
                break;

            case "del" :
                if ($id != null) {
                    $this->db->where('id', $id);
                    $this->db->delete('electeur');
                }
                redirect(base_url('index.php/admin/electeur'));
                break;

            case 'edit' :

                if (isset($_POST['enregistrer'])) {
                    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['sexe']) and !empty($_POST['dateNais']) and !empty($_POST['mail']) and !empty($_POST['mail']) and !empty($_POST['telephone'])) {

                        $id_post = htmlspecialchars(trim($_POST['id_post']));
                        $nom = htmlspecialchars(trim($_POST['nom']));
                        $prenom = htmlspecialchars(trim($_POST['prenom']));
                        $sexe = htmlspecialchars(trim($_POST['sexe']));
                        $dateNais = htmlspecialchars(trim($_POST['dateNais']));
                        $mail = htmlspecialchars(trim($_POST['mail']));
                        $mail2 = htmlspecialchars(trim($_POST['mail2']));
                        $telephone = htmlspecialchars(trim($_POST['telephone']));

                        if ($mail != $mail2) {
                            $erreur = 'email invalide';

                        } else {

                            $update_data = array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'sexe' => $sexe,
                                'dateNaissance' => $dateNais,
                                'email' => $mail,
                                'telephone' => $telephone,
                            );
                            $this->db->where('id', $id_post);

                            if ($this->db->update('electeur', $update_data)) {
                                redirect(base_url('index.php/admin/electeur'));
                            }
                        }

                    } else {
                        $erreur = "Les champs sont obligatoires !";

                    }

                } else {

                    if (!is_null($id)) {
                        $this->db->where('id', $id);
                        $electeur = $this->db->get('electeur')->result_array();

                        $this->load->view('include/admin_electeur_edit', array(
                            'electeur' => $electeur[0],
                        ));
                    } else {
                        redirect('index.php/admin/electeur');
                    }
                }
                break;

            case null :
            default :

                $electeurs = $this->db->get('electeur')->result_array();
                $this->load->view('include/admin_electeur_list', array(
                    'electeurs' => $electeurs,
                ));
        }

        $this->load->view('partial/footer');
        $this->load->view('partial/foot');
    }

    public function make_matricule($longueur)
    {
        $mdp = "";
        $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
        $longueurMax = strlen($possible);
        if ($longueur > $longueurMax) {
            $longueur = $longueurMax;
        }
        $i = 0;
        while ($i < $longueur) {
            $caractere = substr($possible, mt_rand(0, $longueurMax - 1), 1);
            if (!strstr($mdp, $caractere)) {
                $mdp .= $caractere;
                $i++;
            }
        }
        $annee = date("y");

        return 'V.' . $mdp . '.' . $annee;
    }
}

