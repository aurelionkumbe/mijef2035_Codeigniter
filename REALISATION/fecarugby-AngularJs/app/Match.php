<?php

namespace fecarugby;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {

    protected $table = 'match';
    protected $guarded = ['id'];

    public function competitions(){
        return $this->belongsTo('fecarugby\Competition');
    } 
    public function equipeaDomicile() {
        return $this->hasOne('fecarugby\Equipe', 'id', 'equipe_id');   
    }    

    public function equipeaExterieur()
    {
         return $this->hasOne('fecarugby\Equipe', 'id', 'equipe_id1');   
    }

    public function scopeGagnant($query) {
        
    }

    public function scopePerdant($query) {
        
    }

    public function scopeEquipeaDomicile($query) {
        
    }

    public function scopeEquipeaExterieur($query) {
        
    }

}
