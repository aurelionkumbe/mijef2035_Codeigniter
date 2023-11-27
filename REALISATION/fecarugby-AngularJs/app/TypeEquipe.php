<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class TypeEquipe extends Model {

    protected $table = 'type_equipe';
    protected $guarded = ['id'];

 	public function equipes() {
        return $this->hasMany('fecarugby\Equipe', 'type_equipe_id');
    }
}
