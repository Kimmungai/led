<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  public function purchase()
  {
    return $this->belongsTo('App\Purchase');
  }

  public function product()
  {
    return $this->hasOne('App\Product');
  }
  
}
