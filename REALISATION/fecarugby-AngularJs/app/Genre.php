<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

    protected $table = 'genre';
    protected $guarded = ['id'];

    //

    public function equipes() {
        return $this->hasMany('fecarugby\Equipe');
    }

}
