<?php

namespace ToInvestCapital;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $fillable = ['name_en', 'name_fr'];
    public function article() {
        return $this->hasMany('ToInvestCapital\Article');
    }
    //
}
