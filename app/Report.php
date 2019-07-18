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
    return $this->belongsTo('App\Sale');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
