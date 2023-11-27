
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends NEAA_Controller {

	public function __construct()
	{
		parent::__construct();
        
        $_SESSION['user']['loggedin'] = false;
        $_SESSION['nombre_livre'] = 10;
	}

	public function index($offset =0 )
	{
		$this->load->model('Book' , 'book');
		$data = array(
            'titre' => 'Librairie',
			'categories' => $this->book->getAllCategories(),
			'books' =>  $this->book->getAll(null , null, $_SESSION['nombre_livre'], $offset),
            'lastBooks' => $this->book->getLastAdded(),
		);
        // pagination
		$this->load->library('pagination');
        $config['base_url'] = site_url('books/index');
        $config['total_rows'] = count($this->book->getAll(null , null, null, null));
        $config['per_page'] = $_SESSION['nombre_livre'];
        $this->pagination->initialize($config);
        $data['paginationLinks'] = $this->pagination->create_links();
        
	    //var_dump($data); die;
		$this->make_view('bookboard' , $data);
	}

    public function categorie($cat, $offset=0)
	{
		$this->load->model('Book' , 'book');
		$data = array(
            'titre' => 'Librairie',
			'categories' => $this->book->getAllCategories(),
			'books' =>  $this->book->getAllByCategorie($cat,$_SESSION['nombre_livre'], $offset),
            'lastBooks' => $this->book->getLastAdded(),
		);
        
        // pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('books/categorie/'.$cat.'/');
        $config['uri_segment'] = 4;
        $config['total_rows'] = count($this->book->getAllByCategorie($cat,null, null));
        $config['per_page'] = $_SESSION['nombre_livre'];
        $this->pagination->initialize($config);
        $data['paginationLinks'] = $this->pagination->create_links();
        
         //var_dump($config['total_rows']); die;
		$this->make_view('bookboard' , $data);
	}
        
	public function read($id)
	{
		if(!isset($id)) redirect ('books');
            
		$this->session->set_userdata('current_book', $id);
		$this->load->model('Book' , 'book');
		$data = array(
			'titre' => 'Lecture',
			'categories' => $this->book->getAllCategories(),
			'book' =>  $this->book->getBookBySlug($id),
            'lastBooks' =>  $this->book->getLastAdded(),
		);
		
		$this->make_view('read_book' , $data);
	}
        
        

	public function download($id)
	{
		# code...
	}

	public function comment()
	{
            if (isset($_POST)) {
                //var_dump($_POST); die;
                $this->load->model('Model','model');
                $data2 = [];
                $data = $this->input_post();
                //var_dump($data); die;
                if (isset($_SESSION['myId'])) {
                    $data2['personneid'] = $_SESSION['myId'];
                }  else {                
                    $personne = $this->db->get_where('personne', ['email' => $data['email']])->first_row('array');
                    $data2['personneid'] = $personne['id'];                    
                    //var_dump($personne); die;
                }
                if(empty($personne)){
                    $this->load->model('Model' , 'model');
                    $data2['personneid'] = $this->model->insert_personne(array(
                        'isAdmin' => 0,
                        'level' => 'visiteur',
                        'nom' => $data['pseudo'],
                        'email' => $data['email'],
                    ));
                    //var_dump($data2); die;
                }  
                    $data2['livreId'] = $data['livreId'];
                    $data2['dateCreation'] = $this->now();
                    $data2['texte'] = htmlentities($data['commentaire']);
                    $data2['deleted'] = 0;
                    
                //var_dump($data2); die('exist');
                if($this->model->insert_commentaire($data2)){
                    $_SESSION['flash_alert'] = [
                        'type' => 'success',
                        'message' => 'votre commentaire a été posté',
                    ];  //die('inserted');
                }else{
                    $_SESSION['flash_alert'] = [
                        'type' => 'warning',
                        'message' => 'votre commentaire n\'a pas été posté',
                    ];  //die('inserted');
                }
                redirect('books/read/'.$data['slug']);
            }       
	}
}
