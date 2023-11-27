<?php

namespace ToInvestCapital;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $primaryKey = 'code';
    public $incrementing = false;
    public $fillable = ['name', 'code'];
    public function article() {
        return $this->hasMany('ToInvestCapital\Article');
    }

    public function document() {
        return $this->hasMany('ToInvestCapital\Document');
    }
}
