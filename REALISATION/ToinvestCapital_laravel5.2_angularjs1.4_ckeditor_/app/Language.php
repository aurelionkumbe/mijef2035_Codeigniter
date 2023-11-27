<?php

namespace ToInvestCapital;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    public $incrementing = false;
    public $fillable = ['name', 'code'];
    public $primaryKey = 'code';

    public function article() {
        return $this->hasMany('ToInvestCapital\Article');
    }
}
