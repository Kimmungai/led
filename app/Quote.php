<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
  protected $guarded = [];
  
  function quote()
  {
    return $this->hasMany('App\Quote');
  }
}
