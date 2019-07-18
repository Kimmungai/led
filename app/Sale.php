<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  public function revenue()
  {
    return $this->hasMany('App\Revenue');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function report()
  {
    return $this->hasMany('App\Report');
  }
}
