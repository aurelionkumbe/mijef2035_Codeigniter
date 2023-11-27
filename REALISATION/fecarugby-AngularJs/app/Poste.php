<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{


    protected $table = 'poste';
    protected $guarded = ['id'];

    public function dirigeants(){
        
        return $this->hasMany('fecarugby\Dirigeant');
    }

    public function departement()
    {
        return $this->belongsTo('fecarugby\Departement');
    }

}
