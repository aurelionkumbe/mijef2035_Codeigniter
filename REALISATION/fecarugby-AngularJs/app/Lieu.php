<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model {

    protected $table = 'lieu';
    protected $primaryKey = 'id_lieu';
    protected $guarded = ['id_lieu'];
 	
 	public function equipes() {
        return $this->hasMany('fecarugby\Equipe', 'lieu_id_lieu');
    }
}
