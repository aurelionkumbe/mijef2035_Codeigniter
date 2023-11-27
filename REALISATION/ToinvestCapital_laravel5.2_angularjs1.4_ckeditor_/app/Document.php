<?php

namespace ToInvestCapital;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  public $guarded = ['created_at',	'updated_at', 'id'];

  public function country() {
    return $this->belongsTo('ToInvestCapital\Country');
}
public function scopeImage($query)
{
    return $query
    ->where('type', 'png')
    ->orWhere('type', 'jpeg')
    ->orWhere('type', 'jpg');
}
public function scopeImageSlide($query)
{
    return $query->where('type', '=', "slide");
}
public function scopeTexte($query)
{
    return $query->where('type', 'pdf')
    ->orWhere('type', 'txt');
}
}
