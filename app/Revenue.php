<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
  public function sale()
  {
    return $this->belongsTo('App\Sale');
  }

  public function product()
  {
    return $this->hasOne('App\Product');
  }
}
