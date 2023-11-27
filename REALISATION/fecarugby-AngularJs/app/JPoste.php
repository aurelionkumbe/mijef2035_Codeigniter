<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class JPoste extends Model {

    protected $table = 'jposte';
    protected $guarded = ['id'];

    
    public function joueur(){
    	return $this->hasMany('fecarugby\Joueur');
    }
}
