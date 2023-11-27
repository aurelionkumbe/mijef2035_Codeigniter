<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model {

    protected $table = 'produit';
    protected $guarded = ['id_produit'];

}
