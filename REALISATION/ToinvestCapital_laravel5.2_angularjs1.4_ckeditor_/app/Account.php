<?php

namespace ToInvestCapital;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $fillable = ['name'];
    public function user() {
        return $this->hasMany('ToInvestCapital\User');
    }

    public function article() {
        return $this->hasMany('ToInvestCapital\Article');
    }
}
