<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

    protected $table = 'categorie';
    protected $fillable = ['libelle_categorie'];

 	public function equipes() {
        return $this->hasMany('fecarugby\Equipe');
    }
}
