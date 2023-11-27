<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model {

    protected $table = 'departement';
    protected $guarded = ['id'];

    public function postes()
    {
    	return $this->hasMany('fecarugby\Poste');
    }
    
    public function dirigeants()
    {
    	return $this->hasManyThrough('fecarugby\Dirigeant', 'fecarugby\Poste');
    }

}
