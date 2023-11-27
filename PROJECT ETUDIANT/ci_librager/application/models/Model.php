<?php

class Model extends NEAA_Model {

    public function insert_categorie ($data) {
        return parent::insert('categorie' , $data);
    } 
    
    public function insert_personne ($data) {
        return parent::insert('personne' , $data);
    }
    public function insert_commentaire ($data) {
        return parent::insert('commentaire' , $data);
    }
    public function insert_emprunt ($data) {
        return parent::insert('emprunt' , $data);
    }
    
    public function get_emprunts() {
        $query = $this->db->from('emprunt')
                ->join ('personne as p', 'personneid = p.id')
                ->join ('livre as l', 'livreId = l.id')
                ->order_by('dateEmprunt', 'DESC')
                ->get();
                return $query->result_array();
    } 
    
    public function get_emprunt($persId , $livreId) {
        $query = $this->db->from('emprunt')
                ->join ('personne as p', 'personneid = p.id')
                ->join ('livre as l', 'livreId = l.id')
                ->where('personneId', $persId)
                ->where('livreId', $livreId)
                ->get();
                return $query->first_row('array');
    }

    public function update_book($data)
    {
    	$this->db->trans_start();
    	// upload du fichier de pdf

   

    	// upload du fichier image de couverture


		// insertion des vrai donne concernANT LE LIVRE
		


		$this->db->trans_complete();    	
    }
}
