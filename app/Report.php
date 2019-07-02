<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
  public function purchase()
  {
    return $this->hasMany('App\Purchase');
  }

  public function sale()
  {
    return $this->hasMany('App\Sale');
  }

  public function org()
  {
    return $this->belongsTo('App\Org');
  }
}
