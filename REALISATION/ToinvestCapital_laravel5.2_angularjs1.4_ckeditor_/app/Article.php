<?php

namespace ToInvestCapital;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $guarded = ['created_at','deleted'];


    public function account(){
        return $this->belongsTo('ToInvestCapital\Account');
    }
    public function menu(){
        return $this->belongsTo('ToInvestCapital\Menu');
    }
    public function language(){
        return $this->belongsTo('ToInvestCapital\Language');
    }
    public function country(){
        return $this->belongsTo('ToInvestCapital\Country');
    }
  
}
