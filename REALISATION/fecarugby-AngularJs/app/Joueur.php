<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
 	protected $table = 'joueur';
 	protected $primaryKey = 'id_joueur';
    protected $guarded = ['id','equipe_id', 'jposte_id'];   

    public function poste(){
        return $this->belongsTo('fecarugby\JPoste');
    }

    public function equipe(){
        return $this->belongsTo('fecarugby\Equipe');
    }
}
