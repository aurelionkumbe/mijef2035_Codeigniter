<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Console extends MY_Controller {

    private  $page ="workspace";


    private  $parametre;
    function __construct()
    {
        parent::__construct();

        // requetes des donnees
        $q = $this->db->query('select * from Parametre');

        if ($q)
            $this->parametre = $q->row();

    }

	public function index()
	{
	    //die(md5('admin'));



	    // connexion
	    if (isset($_POST['login'])){

            $email = $this->input->post('email');
            $mdp = $this->input->post('password');

            if ($this->parametre){
                if ( $email && $email == $this->parametre->Login && $mdp && md5($mdp) == $this->parametre->Mot_passe)
                {
                    $_SESSION['admin'] = true;
                }
                else
                {

                    $_SESSION['msg'] = '<div class="alert alert-danger text-center">Echec de connexion</div>';
                    $this->session->mark_as_flash('msg');
                }
            }else{
                $_SESSION['msg'] = '<div class="alert alert-danger text-center">Echec de connexion, Aucune parametre recuperer</div>';
                $this->session->mark_as_flash('msg');
            }

        }

        // creer proprio
        if (isset($_POST['create_proprietaire'])){

            $datas = $this->input->post(NULL, TRUE);

            unset($datas['create_proprietaire']);

            if ($this->db->insert('Proprietaire', $datas)){
                $_SESSION['msg'] = '<div class="alert alert-success text-center">Insertion effectuée correctement</div>';
                $this->session->mark_as_flash('msg');
            }else{
                $_SESSION['msg'] = '<div class="alert alert-danger text-center">Echec d\'insertion </div>';
                $this->session->mark_as_flash('msg');
            }

        }

        // creer construction
        if (isset($_POST['create_construction'])){

            $datas = $this->input->post(NULL, TRUE);

            unset($datas['create_construction']);

            if ($this->db->insert('Construction', $datas)){
                $_SESSION['msg'] = '<div class="alert alert-success text-center">Insertion effectuée correctement</div>';
                $this->session->mark_as_flash('msg');
            }else{
                $_SESSION['msg'] = '<div class="alert alert-danger text-center">Echec d\'insertion </div>';
                $this->session->mark_as_flash('msg');
            }

        }

        // requetes des donnees
        $q = $this->db->query('select * from Parametre');

        if ($q)
            $this->parametre = $q->row();

        $constructions = $this->db->query("SELECT  C.*, T.*, C.ID AS ID, P.Nom +' ' + P.Prenom AS Proprietaire 
                                            FROM Construction C JOIN Type T ON C.TypeID = T.ID JOIN Proprietaire P ON P.ID = C.ProprietaireID 
                                            WHERE T.Libelle NOT LIKE 'terrain%' ")->result();


        $avendre = $this->db->query("SELECT C.*, T.*, C.ID AS ID, P.Nom +' ' + P.Prenom AS Proprietaire 
                                      FROM Construction C JOIN Type T ON C.TypeID = T.ID JOIN Proprietaire P ON P.ID = C.ProprietaireID  
                                      WHERE C.A_vendre = 1 AND T.Libelle NOT LIKE 'terrain%' ")->result();

        $alouer = $this->db->query("SELECT C.*, T.*,  C.ID AS ID, P.Nom +' ' + P.Prenom AS Proprietaire 
                                    FROM Construction C JOIN Type T ON C.TypeID = T.ID JOIN Proprietaire P ON P.ID = C.ProprietaireID  
                                    WHERE C.A_louer = 1 AND T.Libelle NOT LIKE 'terrain%' ")->result();

        $terrains = $this->db->query("SELECT C.*, T.*, C.ID AS ID, P.Nom +' ' + P.Prenom AS Proprietaire 
                                      FROM Construction C JOIN Type T ON TypeID = T.ID JOIN Proprietaire P ON P.ID = C.ProprietaireID  
                                      WHERE A_vendre = 1 AND T.Libelle LIKE 'terrain%'")->result();

        $types = $this->db->query("SELECT * FROM Type ")->result();

        $proprietaires = $this->db->query("SELECT * FROM Proprietaire")->result();

        $data = [
            'constructions' => $constructions,
            'constructionsAVendre' => $avendre,
            'constructionsALouer' => $alouer,
            'terrains' => $terrains,
            'types' => $types,
            'proprietaires' => $proprietaires,
            'page' => $this->page,
        ];

        //$this->dump($data);

        $this->load->view('console', $data);
        //redirect(base_url("login"));
	}


    public function parametrages(){


        //changement des parametres du site
        if (isset($_POST['saveParam'])){
            $datas = $this->input->post(NULL, TRUE);

            $mdp = $datas['Mot_passe_ancien'];

            unset($datas['Mot_passe_ancien']);
            unset($datas['saveParam']);
            //$this->dump($datas);
            $this->db->update('Parametre', $datas);
        }

        $data = ['parametre' => $this->parametre,  'page' => 'parametrage',];
        $this->load->view('console', $data);


    }

    public function logout()
    {
      unset($_SESSION["admin"]);
      redirect(base_url('console'));
    }

    public function update_construction($id){


        if (isset($id)){

            if (isset($_POST['update_construction'])){
                $datas = $this->input->post(NULL, TRUE);
                $datas['Localisation'] = trim($datas['Localisation']);
                $datas['Description'] = trim($datas['Description']);
                $datas['Autres_infos'] = trim($datas['Autres_infos']);
                unset($datas['update_construction']);
                $this->db->where('ID', $datas['ID']);

                if ($this->db->update('Construction', $datas)) {
                    $_SESSION['msg'] = '<div class="alert alert-success text-center">Modification effectuée</div>';
                    $this->session->mark_as_flash('msg');


                } else {
                    $_SESSION['msg'] = '<div class="alert alert-danger text-center">Echec de mofication</div>';
                    $this->session->mark_as_flash('msg');
                }

            }

            if (isset($_POST['update_construction_photos'])){

                unset($_POST['update_construction_photos']);


                foreach ($_FILES as $key => $val){

                  if($val['size'] != 0){



                        $upload_data = $this->do_upload_construction($key, "immobilier$id$key");

                        if ($upload_data) {

                            $file_name = $upload_data['file_name'];

                            $upload_data['src'] = 'images/portfolio/'.$file_name;

                            $datas[$key] = json_encode($upload_data);

                            $this->db->where('ID', $id);

                            if ($this->db->update('Construction',$datas)){

                                $_SESSION['msg'] = '<div class="alert alert-success text-center">Modification effectuée</div>';

                                $this->session->mark_as_flash('msg');


                            }else{

                                $_SESSION['msg'] = '<div class="alert alert-danger text-center">Echec de mofication</div>';

                                $this->session->mark_as_flash('msg');

                            }

                        }
                    }

                }

            }

            $q = $this->db->query('SELECT * FROM Construction WHERE ID = ?', compact('id'));

            if ($q){
                $construction = $q->row_array();

                //$this->dump($construction);
                $page = "construction_update";
                $types = $this->db->query("SELECT * FROM `Type` ORDER BY `ID` DESC ")->result();

                $proprietaires = $this->db->query("SELECT * FROM Proprietaire")->result();
                $images = $this->db->query('SELECT * FROM Image WHERE ConstructionID = ?', compact('id'))->result();

                //$this->dump($images);

                $this->load->view('console', compact('construction', 'page', 'types', 'proprietaires', 'images'));

            }
            else{
                redirect(base_url('console'));
            }
        }

    }

    public function update_proprietaire($id){


        if (isset($id)){

            if (isset($_POST["update_proprietaire"])){



                //$blob = file_get_contents($_FILES['Photo']['tmp_name']);
                //echo get_file_info($blob);
                //echo ""; die();

                $upload_data = $this->do_upload_proprio("proprietaire$id");
                if ($upload_data){

                    //$this->dump($upload_data);
                    $datas = $this->input->post(NULL, TRUE);
                    $file_name = $upload_data['file_name'];


                    unset($datas['update_proprietaire']);

                    $this->db->where('ID', $datas['ID']);
                    $datas['Photo'] = 'images/portfolio/'.$file_name;

                    if ($this->db->update('Proprietaire',$datas)){

                        $_SESSION['msg'] = '<div class="alert alert-success text-center">Modification effectuée</div>';

                        $this->session->mark_as_flash('msg');


                    }else{

                        $_SESSION['msg'] = '<div class="alert alert-danger text-center">Echec de mofication</div>';

                        $this->session->mark_as_flash('msg');

                    }

                }

            }

            $q = $this->db->query('SELECT * FROM Proprietaire WHERE ID = ?', compact('id'));

            if ($q){
                $proprietaire = $q->row();
                //$this->dump($proprietaire->ID);
                $page = "proprietaire_update";
                $this->load->view('console', compact('proprietaire', 'page'));
            }
            else{
                redirect(base_url('console'));
            }
        }

    }

    public function do_upload_proprio($file_name)
    {


        $config['file_name']            = $file_name;
        $config['upload_path']          = "./images/portfolio/";
        $config['allowed_types']        = 'jpg'; //'gif|jpg|png';
        $config['max_size']             = 2 * 1024;
        $config['min_width']           = 370;
        $config['min_height']           = 250;
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('Photo'))
        {
            $error = array('error' => $this->upload->display_errors());
            $_SESSION['msg'] = '<div class="alert alert-danger text-center">'.$error['error'].'</div>';

            return FALSE;

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->upload->data('full_path');
            //$config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 370;
            $config['height']       = 250;

            $this->load->library('image_lib', $config);


            $this->image_lib->resize();

            return $data['upload_data'];

        }
    }

    public function do_upload_construction($inputName, $file_name)
    {

        $this->load->library('upload');


        $config['file_name']            = $file_name;
        $config['upload_path']          = "./images/portfolio/";
        $config['allowed_types']        = 'jpg'; //'gif|jpg|png';
        $config['max_size']             = 2 * 1024;
        $config['min_width']           = 370;
        $config['min_height']           = 250;
        $config['file_ext_tolower']     = TRUE;
        $config['overwrite']            = TRUE;


        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($inputName))
        {

            $error = array('error' => $this->upload->display_errors());
            $_SESSION['msg'] = '<div class="alert alert-danger text-center">'.$error['error'].'</div>';

            return FALSE;

        }
        else
        {

            $data1 = array('upload_data' => $this->upload->data());

            $this->load->library('image_lib');

            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->upload->data('full_path');
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 370;
            $config['height']       = 250;


            $this->image_lib->initialize($config);


            $this->image_lib->resize();

            return $data1['upload_data'];

        }
    }


    /*        block de suppression
     *     ******************************/

    /**
     * @param $id identifiant du terrain ou maison ou bureau ...
     */
    public function delete_construction($id){

        if (isset($id)){

            $q = $this->db->query('DELETE FROM Construction WHERE ID = ?', compact('id'));
            if ($q){
            }
            else{
            }
            redirect(base_url('console'));

        }

    }

    /**
     * @param $id identifiant du proprietaire
     *
     */
    public function delete_proprietaire($id){

        if (isset($id)){

            $q = $this->db->query('DELETE FROM Proprietaire WHERE ID = ?', compact('id'));
            if ($q){
            }
            else{
            }
            redirect(base_url('console'));

        }

    }


}
