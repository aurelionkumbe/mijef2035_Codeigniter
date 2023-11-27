<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Dirigeant extends Model {

    protected $table = 'dirigeant';
    protected $guarded = ['id'];

    public function poste()
    {
    	return $this->belongsTo('fecarugby\Poste');
    }

}
