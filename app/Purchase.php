<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  public function expense()
  {
    return $this->hasMany('App\Expense');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
