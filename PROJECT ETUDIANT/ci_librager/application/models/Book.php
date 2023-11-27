<?php

class Book extends NEAA_Model {
    
    public $categories = [];
    public $auteurs = [];
    public $editions = [];
    public $rayons = [];
    public $catalogues = [];
    
    
    protected $table = 'livre';

    public function __construct() {
        parent::__construct();
        $this->categories = $this->getAllCategories();
        $this->editions = $this->getAllEditions();
        $this->catalogues = $this->getAllCatalogues();
        $this->auteurs = $this->getAllAuteurs();
        $this->rayons = $this->getAllRayons();
    }
    



    public function getAllByCategorie ($cat, $limit = null , $offset=null) {

        $data = ['*' , 'e.nom as nomEdition' , 'cata.nom as nomCata' , 'cat.nom as nomCat' , 'a.nom as nomAuteur' , 'r.nom as nomRayon'];
        $this->db->select($data);
        $this->db->from('livre as l');
        $this->db->join('categorie as cat', 'l.categorieId = cat.id');
        $this->db->join('catalogue as cata', 'l.catalogueId = cata.id');
        $this->db->join('edition as e', 'l.editionId = e.id');
        $this->db->join('auteur as a', 'l.auteurId = a.id');
        $this->db->join('rayon as r', 'l.rayonId = r.id');
        
        $this->db->where('l.deleted' ,'<> 1');
        $this->db->where('l.categorieId', $cat)->or_where('cat.nom', $cat);
        $this->db->order_by('l.id' ,'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();

    }  

    public function getAll ($table=null, $columns=null, $limit = null , $offset=null) {

        $data = ['l.*', 'e.nom as nomEdition' , 'cata.nom as nomCata' , 'cat.nom as nomCat' , 'a.nom as nomAuteur' , 'l.rayon as nomRayon, deleted'];
        $this->db->select($data);
        $this->db->from('livre as l');
        $this->db->join('categorie as cat', 'l.categorieId = cat.id');
        $this->db->join('catalogue as cata', 'l.catalogueId = cata.id');
        $this->db->join('edition as e', 'l.editionId = e.id');
        $this->db->join('auteur as a', 'l.auteurId = a.id');


        $this->db->where('l.deleted' ,'<> 1');
        $this->db->order_by('l.id' ,'DESC');
        $this->db->limit($limit, $offset);
        $q = $this->db->get();
        return $q->result_array(); 
    }
    public function getLastAdded ($table = null , $limit = 10) {

        $this->db->where('l.deleted' ,'<> 1');
        $q = $this->db->get('livre as l');
        return $q->result_array();
    }
    public function getBook ($id) {

        $data = ['l.*', 'l.id as idLivre', 'e.nom as nomEdition' , 'cata.nom as nomCata' , 'cat.nom as nomCat' , 'a.nom as nomAuteur' , 'l.rayon as nomRayon, deleted'];

        //$get_livre = '(select * from '.$this->table.' order by id desc limit '.$limit.')';

        $this->db->select($data);
        $this->db->from('livre as l');
        $this->db->join('categorie as cat', 'l.categorieId = cat.id');
        $this->db->join('catalogue as cata', 'l.catalogueId = cata.id');
        $this->db->join('edition as e', 'l.editionId = e.id');
        $this->db->join('auteur as a', 'l.auteurId = a.id');
        $this->db->where('l.id', $id);
        $this->db->where('l.deleted', '<> 1');
        $this->db->limit(1);
 

        $book = $this->db->get($this->table)->first_row('array');
        $book['commentaires'] = $this->db->from('commentaire')
                                        ->join('personne', 'personneid = personne.id')
                                        ->where('livreid' , $book['id'])
                                        ->order_by('commentaire.id', 'DESC')
                                        ->get()->result_array();
        //var_dump($book); die;
        return $book;
    }

    public function getBookBySlug ($slug) {

        $data = ['l.*', 'e.nom as nomEdition' , 'cata.nom as nomCata' , 'cat.nom as nomCat' , 'a.nom as nomAuteur' , 'l.rayon as nomRayon'];


        $this->db->select($data);
        $this->db->from('livre as l');
        $this->db->join('categorie as cat', 'l.categorieId = cat.id');
        $this->db->join('catalogue as cata', 'l.catalogueId = cata.id');
        $this->db->join('edition as e', 'l.editionId = e.id');
        $this->db->join('auteur as a', 'l.auteurId = a.id');
        $this->db->like('l.slug', $slug);
        //$this->db->where('l.deleted', '<> 1');
        $this->db->order_by('l.id' ,'DESC');
        //$this->db->limit(1);

        $book = $this->db->get($this->table)->first_row('array');
        $book['commentaires'] = $this->db->from('commentaire')
                                        ->join('personne', 'personneid = personne.id')
                                        ->where('livreId' , $book['id'])
                                        ->order_by('commentaire.id', 'DESC')
                                        ->get()->result_array();

        //var_dump($book); die;
        return $book;
    }

    public function getAllCategories (){
        $cat = $this->db->select('c.id as id, c.nom as nom , count(l.id) as quantite')
        ->join('livre as l', 'c.id = l.categorieId', 'left')
        ->where('l.deleted', '<> 1')
        ->group_by('c.nom')->get('categorie as c')->result_array();
            return $cat;
    }
    public function getAllEditions (){
        return $this->db->distinct()->get('edition')->result_array();
    }
    public function getAllRayons (){
        return [];
    }
    public function getAllCatalogues (){
        return $this->db->get('catalogue')->result_array();
    }
    public function getAllAuteurs (){
        return $this->db->get('auteur')->result_array();
    }
}

