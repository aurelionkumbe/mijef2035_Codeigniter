<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {

    protected $table = 'equipe';
    protected $guarded = ['id'];

    public function competitions(){
    	return $this->belongsToMany('fecarugby\Competition', 'equipe_competition')->withPivot('nbre_point', 'rang');
    }

    public function genre(){
        return $this->belongsTo('fecarugby\Genre');
    }
    public function lieu(){
        return $this->belongsTo('fecarugby\Lieu', 'lieu_id_lieu');
    }
    public function typeEquipe(){
        return $this->belongsTo('fecarugby\TypeEquipe', 'type_equipe_id');
    }
    public function categorie(){
        return $this->belongsTo('fecarugby\Categorie');
    }
    public function joueurs()
    {   
        return $this->hasMany('fecarugby\Joueur');  
    }
    public function matchs()
    {	
        return $this->hasMany('fecarugby\Equipe', 'equipe_id', 'equipe_id1');  
    }

    public function matchsaDomicile() {
        return $this->hasMany('fecarugby\Equipe', 'equipe_id');   
    }    

    public function matchsaExterieur()
    {
         return $this->hasMany('fecarugby\Equipe', 'equipe_id1');   
    }
}
