<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model {

    protected $table = 'competition';
    protected $guarded = ['id'];

    public function matchs(){
    	return $this->hasMany('fecarugby\Match');
    }


    public function equipes(){
    	return $this->belongsToMany('fecarugby\Equipe','equipe_competition')->withPivot('nbre_point', 'rang');
    }

    public function scopeNationale($query) {
        return $query->where('niveau', 'like', 'N%')->orWhere('niveau', 'like', 'n%');
    }

    public function scopeInternationale($query) {
        return $query->where('niveau', 'like', 'I%')->orWhere('niveau', 'like', 'i%');
    }

}
