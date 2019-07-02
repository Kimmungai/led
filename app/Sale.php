<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  public function product()
  {
    return $this->hasMany('App\Revenue');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
